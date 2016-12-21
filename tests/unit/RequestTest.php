<?php

use Symfony\Component\Yaml\Yaml;
use CS\MailService\Request;

class RequestTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    private $settings = [
        'name' => 'test',
        'defaultLocale' => 'en',
        'templates' => [
            'first' => [
                'sender' => 'a@a.com',
                'subject' => [
                    'en' => 'some subject'
                ]
            ],
            'third' => [
                'sender' => 'a@a.com',
                'subject' => [
                    'en' => ['Hello %s', ['name']]
                ]
            ],
            'fourth' => [
                'sender' => 'a@a.com',
                'subject' => [
                    'en' => 'some subject'
                ],
                'senderName' => 'support center',
                'registerLead' => false,
                'analyticsCampaign' => 'test-campaign',
                'group' => 'test-group'
            ]
        ]
    ];

    protected function _before()
    {
        
    }

    protected function _after()
    {
    }

    // tests
    public function testExceptions()
    {
        $this->tester->expectException(new \Exception("Message type not defined"), function () {
            return new Request([], $this->settings);
        });

        $this->tester->expectException(new \Exception("Recipient not defined"), function () {
            return new Request(['type' => 'first'], $this->settings);
        });

        $this->tester->expectException(new \Exception("Template 'second' not exists"), function () {
            return new Request(['type' => 'second', 'to' => 'i@a.com'], $this->settings);
        });

        $this->tester->expectException(new \Exception("Sender not defined"), function () {
            $settings = $this->settings;
            unset($settings['templates']['first']['sender']);

            return new Request(['type' => 'first', 'to' => 'i@a.com'], $settings);
        });
    }

    public function testEmpty() {
        $request = new Request([
            'type' => 'first',
            'to' => 'i@a.com'
        ], $this->settings);

        $this->tester->assertEquals('i@a.com', $request->getRecipient());
        $this->tester->assertEquals('first', $request->getMessageType());
        $this->tester->assertEquals([], $request->getParams());
        $this->tester->assertFalse($request->hasReplyTo());
        $this->tester->assertNull($request->getReplyTo());
        $this->tester->assertEquals('a@a.com', $request->getSender());
        $this->tester->assertEquals('en', $request->getLocale());
        $this->tester->assertEquals('test', $request->getSite());
        $this->tester->assertNull($request->getUser());
        $this->tester->assertNull($request->getGroup());
        $this->tester->assertEquals([], $request->getAnalyticsParams());
        $this->tester->assertEquals([
            'params' => [],
            'title' => 'some subject',
            'group' => null
        ], $request->getTemplateVariables());
        $this->tester->assertTrue($request->registerLead());

    }

    public function testUser()
    {
        $request = new Request([
            'type' => 'first',
            'to' => 'i@a.com',
            'user_id' => 1,
        ], $this->settings);

        $this->tester->assertEquals(1, $request->getUser());
    }

    public function testSubject()
    {
        $request = new Request([
            'type' => 'third',
            'to' => 'i@a.com',
            'params' => [
                'name' => 'John'
            ]
        ], $this->settings);

        $this->tester->assertEquals('Hello John', $request->getSubject());

        $this->tester->expectException(new \Exception("Parameter 'name' needed for subject string creation"), function () {
            return new Request([
                'type' => 'third',
                'to' => 'i@a.com'
            ], $this->settings);
        });
    }

    public function testReplyTo()
    {
        $request = new Request([
            'type' => 'first',
            'to' => 'i@a.com',
            'replyTo' => 'a@a.com'
        ], $this->settings);

        $this->tester->assertEquals('a@a.com', $request->getReplyTo());
    }

    public function testTemplateSettings()
    {
        $request = new Request([
            'type' => 'fourth',
            'to' => 'i@a.com',
            'params' => [1, 2]
        ], $this->settings);

        $this->tester->assertEquals(['a@a.com' => 'support center'], $request->getSender());
        $this->tester->assertFalse($request->registerLead());
        $this->tester->assertEquals(['campaign' => 'test-campaign'], $request->getAnalyticsParams());
        $this->tester->assertEquals('test-group', $request->getGroup());
        $this->tester->assertEquals([
            'params' => [1, 2],
            'title' => 'some subject',
            'group' => 'test-group'
        ], $request->getTemplateVariables());
    }

    public function testOtherSettings()
    {
        $settings = $this->settings;
        $settings['defaultAnalyticsParams'] = [
            'source' => 'test-source',
            'medium' => 'test-medium'
        ];
        $settings['templatesVariables'] = [
            'a' => 'b'
        ];

        $request = new Request([
            'type' => 'first',
            'to' => 'i@a.com',
            'params' => [
                'name' => 'John Smith'
            ]
        ], $settings);

        $this->tester->assertEquals([
            'source' => 'test-source',
            'medium' => 'test-medium'
        ], $request->getAnalyticsParams());

        $this->tester->assertEquals([
            'a' => 'b',
            'params' => [
                'name' => 'John Smith'
            ],
            'title' => 'some subject',
            'group' => null
        ], $request->getTemplateVariables());
    }
}