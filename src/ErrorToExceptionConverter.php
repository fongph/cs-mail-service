<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CS\MailService;

/**
 * Description of ErrorToExceptionConverter
 *
 * @author orest
 */
class ErrorToExceptionConverter {

    protected $types = array(
        E_ERROR => 'Fatal Runtime Error',
        E_WARNING => 'Runtime Warning',
        E_PARSE => 'Fatal Parse',
        E_NOTICE => 'Runtime Notice',
        E_CORE_ERROR => 'Fatal PHP Startup Error',
        E_CORE_WARNING => 'PHP Startup Warning',
        E_COMPILE_ERROR => 'Fatal Compilation Error',
        E_COMPILE_WARNING => 'Compilation Warning',
        E_USER_ERROR => 'User-generated Error',
        E_USER_WARNING => 'User-generated Warning',
        E_USER_NOTICE => 'User-generated Notice',
        E_STRICT => 'Runtime Notice (Strict)',
        E_RECOVERABLE_ERROR => 'Catchable Fatal Error',
        E_DEPRECATED => 'Deprecated Warning',
        E_USER_DEPRECATED => 'User Deprecated Warning',
    );

    public static function init()
    {
        set_error_handler(array(__CLASS__, 'errorHandler'));
        register_shutdown_function(array(__CLASS__, 'shutdownHandler'));
    }

    public static function errorHandler($errorCode, $errorMessage, $scriptPath, $lineNumber)
    {
        $message = self::getErrorExceptionMessage($errorCode, $errorMessage);
        throw new \ErrorException($message, $errorCode, 1, $scriptPath, $lineNumber);
    }

    public static function shutdownHandler()
    {
        $lastError = error_get_last();
        if (strpos($lastError['message'], "bytes exhausted")) {
            $message = $this->getErrorExceptionMessage($lastError['type'], $lastError['message']);
            throw new \ErrorException($message, $lastError['type'], 1, $lastError['file'], $lastError['line']);
        }
    }

    private static function getErrorExceptionMessage($code, $message)
    {
        $errorName = self::codeToString($code);
        return "Catched error ({$errorName}) - {$message}";
    }

    private static function codeToString($code)
    {
        switch ($code) {
            case E_ERROR:
                return 'E_ERROR';
            case E_WARNING:
                return 'E_WARNING';
            case E_PARSE:
                return 'E_PARSE';
            case E_NOTICE:
                return 'E_NOTICE';
            case E_CORE_ERROR:
                return 'E_CORE_ERROR';
            case E_CORE_WARNING:
                return 'E_CORE_WARNING';
            case E_COMPILE_ERROR:
                return 'E_COMPILE_ERROR';
            case E_COMPILE_WARNING:
                return 'E_COMPILE_WARNING';
            case E_USER_ERROR:
                return 'E_USER_ERROR';
            case E_USER_WARNING:
                return 'E_USER_WARNING';
            case E_USER_NOTICE:
                return 'E_USER_NOTICE';
            case E_STRICT:
                return 'E_STRICT';
            case E_RECOVERABLE_ERROR:
                return 'E_RECOVERABLE_ERROR';
            case E_DEPRECATED:
                return 'E_DEPRECATED';
            case E_USER_DEPRECATED:
                return 'E_USER_DEPRECATED';
        }
        return 'Unknown PHP error';
    }

}
