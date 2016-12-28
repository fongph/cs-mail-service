<?php

use CS\MailService\ErrorToExceptionConverter;


class ErrorToExceptionConverterTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testErrorHandler()
    {
        $this->tester->expectException(new \ErrorException('Catched error (E_ERROR) - Fatal Runtime Error', 1, 1, '', 1), function () {
            return  ErrorToExceptionConverter::errorHandler(1, 'Fatal Runtime Error', '', 1);
        });
        $this->tester->expectException(new \ErrorException('Catched error (E_WARNING) - Runtime Warning', 2, 1, '', 1), function () {
            return  ErrorToExceptionConverter::errorHandler(2, 'Runtime Warning', '', 1);
        });
        $this->tester->expectException(new \ErrorException('Catched error (E_PARSE) - Fatal Parse', 4, 1, '', 1), function () {
            return  ErrorToExceptionConverter::errorHandler(4, 'Fatal Parse', '', 1);
        });
        $this->tester->expectException(new \ErrorException('Catched error (E_NOTICE) - Runtime Notice', 8, 1, '', 1), function () {
            return  ErrorToExceptionConverter::errorHandler(8, 'Runtime Notice', '', 1);
        });
        $this->tester->expectException(new \ErrorException('Catched error (E_CORE_ERROR) - Fatal PHP Startup Error', 16, 1, '', 1), function () {
            return  ErrorToExceptionConverter::errorHandler(16, 'Fatal PHP Startup Error', '', 1);
        });
        $this->tester->expectException(new \ErrorException('Catched error (E_CORE_WARNING) - PHP Startup Warning', 32, 1, '', 1), function () {
            return  ErrorToExceptionConverter::errorHandler(32, 'PHP Startup Warning', '', 1);
        });
        $this->tester->expectException(new \ErrorException('Catched error (E_COMPILE_ERROR) - Fatal Compilation Error', 64, 1, '', 1), function () {
            return  ErrorToExceptionConverter::errorHandler(64, 'Fatal Compilation Error', '', 1);
        });
        $this->tester->expectException(new \ErrorException('Catched error (E_COMPILE_WARNING) - Compilation Warning', 128, 1, '', 1), function () {
            return  ErrorToExceptionConverter::errorHandler(128, 'Compilation Warning', '', 1);
        });
        $this->tester->expectException(new \ErrorException('Catched error (E_USER_ERROR) - User-generated Error', 256, 1, '', 1), function () {
            return  ErrorToExceptionConverter::errorHandler(256, 'User-generated Error', '', 1);
        });
        $this->tester->expectException(new \ErrorException('Catched error (E_USER_WARNING) - User-generated Warning', 512, 1, '', 1), function () {
            return  ErrorToExceptionConverter::errorHandler(512, 'User-generated Warning', '', 1);
        });
        $this->tester->expectException(new \ErrorException('Catched error (E_USER_NOTICE) - User-generated Notice', 1024, 1, '', 1), function () {
            return  ErrorToExceptionConverter::errorHandler(1024, 'User-generated Notice', '', 1);
        });
        $this->tester->expectException(new \ErrorException('Catched error (E_STRICT) - Runtime Notice (Strict)', 2048, 1, '', 1), function () {
            return  ErrorToExceptionConverter::errorHandler(2048, 'Runtime Notice (Strict)', '', 1);
        });
        $this->tester->expectException(new \ErrorException('Catched error (E_RECOVERABLE_ERROR) - Runtime Notice (Strict)', 4096, 1, '', 1), function () {
            return  ErrorToExceptionConverter::errorHandler(4096, 'Runtime Notice (Strict)', '', 1);
        });
        $this->tester->expectException(new \ErrorException('Catched error (E_DEPRECATED) - Catchable Fatal Error', 8192, 1, '', 1), function () {
            return  ErrorToExceptionConverter::errorHandler(8192, 'Catchable Fatal Error', '', 1);
        });
        $this->tester->expectException(new \ErrorException('Catched error (E_USER_DEPRECATED) - Deprecated Warning', 16384, 1, '', 1), function () {
            return  ErrorToExceptionConverter::errorHandler(16384, 'Deprecated Warning', '', 1);
        });
        $this->tester->expectException(new \ErrorException('Catched error (Unknown PHP error) - Deprecated Warning', 5, 1, '', 1), function () {
            return  ErrorToExceptionConverter::errorHandler(5, 'Deprecated Warning', '', 1);
        });


    }

    public function testShutdownHandler()
    {

        $this->tester->expect(ErrorToExceptionConverter::shutdownHandler() instanceof ErrorToExceptionConverter);
        
    }

    public function testInit()
    {
        $this->tester->expect(ErrorToExceptionConverter::init() instanceof ErrorToExceptionConverter);

    }

}