<?php

use CS\MailService\Mail;
use CS\MailService\Request;
use CS\MailService\TemplateEngine;
use Symfony\Component\Yaml\Yaml;

class MailTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    private $settings;

    protected function _before()
    {
        $this->settings = Yaml::parse(file_get_contents("settings/pumpic.yml"));

    }

    protected function _after()
    {
    }

    // tests
    public function testMe()
    {
        $request = new Request([
            'type' => 'finalReminder',
            'to' => 'i@a.com',
            'user_id' => 1,
        ], $this->settings);

        $templateEngine = new TemplateEngine($request->getSite(), $request->getLocale());

        $mail = new Mail($request, $templateEngine);


//        $this->tester->assertEquals(, $mail->getMessage());



    }
}