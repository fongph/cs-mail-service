<?php

use Symfony\Component\Yaml\Yaml;
use CS\MailService\Request;
use CS\MailService\Mail;


class LenaTest extends \Codeception\Test\Unit
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
        $request = new Request([], $this->settings);
        $templateEngine = new TemplateEngine($request->getSite(), $request->getLocale());
        $mail = new Mail($request, $templateEngine);

        $mail->getMessage();
    }
}