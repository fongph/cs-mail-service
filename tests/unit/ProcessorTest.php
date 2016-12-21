<?php

use CS\MailService\Processor;
use Psr\Log\LoggerInterface;
use Swift_Mailer;

class ProcessorTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    /**
     *
     * @var \Swift_Mailer
     */
    private $mailer;
    /**
     *
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testMe()
    {
        $processor = new Processor(Swift_Mailer $mailer, LoggerInterface $logger);


    }
}