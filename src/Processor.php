<?php

namespace CS\MailService;

use Swarrot\Processor\ProcessorInterface;
use PhpAmqpLib\Channel\AMQPChannel;
use Swarrot\Broker\MessageProvider\PhpAmqpLibMessageProvider;
use Swarrot\Broker\MessagePublisher\PhpAmqpLibMessagePublisher;
use Swarrot\Broker\Message;
use Swarrot\Consumer;
use Monolog\Logger;
use Symfony\Component\Yaml\Yaml;
use Swift_Mailer;

/**
 * Description of Processor
 *
 * @author orest
 */
class Processor implements ProcessorInterface {

    const RETRY_ATTEMPTS_COUNT = 5;

    private $messageProvider;
    private $messagePublisher;
    private $providerKey;
    private $failedKey;
    private $logger;
    private $message;

    /**
     *
     * @var Swift_Mailer
     */
    private $mailer;
    private static $fatalErrors = [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR, E_USER_ERROR];

    public function __construct(AMQPChannel $queueChannel, $providerKey, $failedKey, Swift_Mailer $mailer, Logger $logger)
    {
        $this->providerKey = $providerKey;
        $this->failedKey = $failedKey;
        $this->messageProvider = new PhpAmqpLibMessageProvider($queueChannel, $this->providerKey);
        $this->messagePublisher = new PhpAmqpLibMessagePublisher($queueChannel, '');
        $this->mailer = $mailer;
        $this->logger = $logger;

        $this->setErrorHendler();
        $this->setExceptionHandler();

        $this->logger->addInfo("Processor created");
    }

    /**
     * 
     * @todo add multi sites support
     * @param Message $message
     * @param array $options
     */
    public function process(Message $message, array $options)
    {
        $this->message = $message;

        $this->logger->debug(sprintf("Consume message #%d", $message->getId()));
        $data = @json_decode($message->getBody(), true);

        if (!$data) {
            throw new \Exception("Message must be a valid JSON string");
        }

        $siteSettings = Yaml::parse(file_get_contents("settings/pumpic.yml"));

        $request = new Request($data, $siteSettings);

        $type = $request->getMessageType();
        $this->logger->addInfo("Message with type '{$type}' received");

        $templateEngine = new TemplateEngine($request->getSite(), $request->getLocale());

        try {
            $mail = new Mail($request, $templateEngine);
            $mail->send($this->mailer);
            $this->logger->addInfo("Mail '{$type}' sended");
        } catch (\Exception $e) {
            $message = $this->getExceptionMessageForLogging($e);
            $this->logger->addWarning($message);
            return $this->retryTask();
        }

        $this->messageProvider->ack($message);
    }

    protected function retryTask()
    {
        $properties = $this->message->getProperties();

        $attempts = 0;
        if (isset($properties['headers']['retry_attempts'])) {
            $attempts = ++$properties['headers']['retry_attempts'];
        }

        $this->logger->addInfo("Failed. Retry attempts passed: {$attempts}");

        if ($attempts >= self::RETRY_ATTEMPTS_COUNT) {
            $this->logger->addError(sprintf("Stop attempting to process task after %d attempts", self::RETRY_ATTEMPTS_COUNT));
            $this->setFailed();
        } else {
            $newMessage = new Message($this->message->getBody(), [
                'headers' => [
                    'retry_attempts' => $attempts
                ]
            ]);

            $this->messagePublisher->publish($newMessage, $this->providerKey);
            $this->messageProvider->nack($this->message);
        }

        return;
    }

    private function setFailed()
    {
        $newMessage = new Message($this->message->getBody());

        $this->messagePublisher->publish($newMessage, $this->failedKey);
        $this->messageProvider->nack($this->message);
    }

    private function setErrorHendler()
    {
        set_error_handler(function($errorCode, $errorString, $errorFile, $errorLine) {
            $errorName = self::codeToString($errorCode);
            if (in_array($errorCode, self::$fatalErrors)) {
                $this->logger->alert("Catched error ({$errorName}) - {$errorString} on {$errorFile}:{$errorLine}");
                $this->setFailed();
                die();
            } else {
                $this->logger->warning("Catched error ({$errorName}) - {$errorString} on {$errorFile}:{$errorLine}");
            }
            return true;
        });

        register_shutdown_function(function() {
            $error = error_get_last();

            if ($error["type"] == E_ERROR) {
                $errorName = self::codeToString($error['type']);
                $this->logger->alert("Catched error ({$errorName}) - {$error["message"]} on {$error["file"]}:{$error["line"]}");
                $this->setFailed();
                die();
            }
        });
    }

    private function setExceptionHandler()
    {
        set_exception_handler(function(\Exception $exception) {
            $mesage = $this->getExceptionMessageForLogging($exception);
            $this->logger->alert($mesage);
            $this->setFailed();
            die();
        });
    }

    private function getExceptionMessageForLogging(\Exception $exception)
    {
        $exceptionClassName = get_class($exception);

        return "Catched exception '{$exceptionClassName}' with message '{$exception->getMessage()}' on {$exception->getFile()}:{$exception->getLine()}";
    }

    public function startConsume()
    {
        $consumer = new Consumer($this->messageProvider, $this);
        $consumer->consume();
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
