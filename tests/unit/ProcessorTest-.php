<?php

use CS\MailService\Processor;
use Psr\Log\LoggerInterface;
use Swift_Mailer;
use Swift_Transport;

class ProcessorTest extends \Codeception\Test\Unit
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
    public function testMe()
    {
   
        $mailer = new Swift_Mailer();


        $processor = new Processor($mailer, $logger);


    }
}