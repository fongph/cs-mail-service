<?php

namespace CS\MailService;

use Swarrot\Processor\ProcessorInterface;
use Swarrot\Broker\Message;
use Psr\Log\LoggerInterface;

/**
 * Description of MessageDebugProcessor
 *
 * @author orest
 */
class MessageDebugProcessor implements ProcessorInterface {

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
        $this->logger->debug("[MessageDebug] Received message", [
            'swarrot_processor' => 'message_debug',
            'message' => $message->getBody(),
            'message_properties' => $message->getProperties()
        ]);
        return $this->processor->process($message, $options);
    }

}
