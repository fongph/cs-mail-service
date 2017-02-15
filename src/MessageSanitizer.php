<?php
namespace CS\MailService;

use Swarrot\Processor\ProcessorInterface;
use Swarrot\Broker\Message;
use Psr\Log\LoggerInterface;

/**
 * Special class for sanitizing Message object
 *
 * @author orest
 */
class MessageSanitizer implements ProcessorInterface
{
    protected $processor;

    /**
     * @var Psr\Log\LoggerInterface
     */
    protected $logger;

    public function __construct($processor, LoggerInterface $logger)
    {
        $this->processor = $processor;
        $this->logger = $logger;
    }

    public function process(Message $message, array $options)
    {
        $properties = $message->getProperties();

        /*
        remove x-death header, caused by retrying of sending message
        with MQ setup
        */
        if (isset($properties['headers']['x-death']))
            unset($properties['headers']['x-death']);

        $message = new Message(
            $message->getBody(),
            $properties,
            $message->getId()
        );

        return $this->processor->process($message, $options);
    }

}