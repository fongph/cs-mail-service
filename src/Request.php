<?php

namespace CS\MailService;

/**
 * Description of Request
 *
 * @author orest
 */
class Request {

    private $locale;
    private $site;
    private $user;
    private $subject;
    private $data;
    private $sender;
    private $group;
    private $analyticsParams = [];
    private $templateVariables = [];
    private $registerLead = true;

    public function __construct($data, $siteSettings)
    {
        $this->site = $siteSettings['name'];
        $this->locale = $siteSettings['defaultLocale'];

        if (!isset($data['type'])) {
            throw new \Exception("Message type not defined");
        }

        if (!isset($data['to'])) {
            throw new \Exception("Recipient not defined");
        }

        if (!isset($siteSettings['templates'][$data['type']])) {
            throw new \Exception("Template '{$data['type']}' not exists");
        }

        $templateSettings = $siteSettings['templates'][$data['type']];

        if (!isset($templateSettings['sender'])) {
            throw new \Exception("Sender not defined");
        }

        if (isset($data['params'])) {
            $this->subject = $this->generateSubject($templateSettings['subject'][$this->locale], $data['params']);
        } else {
            $this->subject = $this->generateSubject($templateSettings['subject'][$this->locale]);
        }

        if (isset($data['user_id'])) {
            $this->user = $data['user_id'];
        }

        if (isset($templateSettings['senderName'])) {
            $this->sender = [$templateSettings['sender'] => $templateSettings['senderName']];
        } else {
            $this->sender = $templateSettings['sender'];
        }

        if (isset($siteSettings['defaultAnalyticsParams'])) {
            $this->analyticsParams = $siteSettings['defaultAnalyticsParams'];
        }

        if (isset($templateSettings['registerLead'])) {
            $this->registerLead = $templateSettings['registerLead'];
        }

        if (isset($templateSettings['analyticsCampaign'])) {
            $this->analyticsParams['campaign'] = $templateSettings['analyticsCampaign'];
        }

        if (isset($siteSettings['templatesVariables'])) {
            $this->templateVariables = $siteSettings['templatesVariables'];
        }

        if (isset($templateSettings['group'])) {
            $this->group = $templateSettings['group'];
        }
        if (isset($data['params']['name']) && !empty($data['params']['name'])){
            $fullName = explode(' ', $data['params']['name']);
            $data['params']['firstName'] = $fullName[0];
        }

        $this->data = $data;

        $this->templateVariables = array_merge($this->templateVariables, [
            'params' => $this->getParams(),
            'title' => $this->subject,
            'group' => $this->group
        ]);
    }

    public function getRecipient()
    {
        return $this->data['to'];
    }

    public function getMessageType()
    {
        return $this->data['type'];
    }

    public function getParams()
    {
        if (isset($this->data['params'])) {
            return $this->data['params'];
        }

        return [];
    }

    /**
     * @todo read this configuration from local config (not from request)
     */
    public function hasReplyTo()
    {
        return isset($this->data['replyTo']);
    }

    /**
     * @todo read this configuration from local config (not from request)
     */
    public function getReplyTo()
    {
        if (isset($this->data['replyTo'])) {
            return $this->data['replyTo'];
        }

        return null;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getSender()
    {
        return $this->sender;
    }

    public function getLocale()
    {
        return $this->locale;
    }

    public function getSite()
    {
        return $this->site;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getGroup()
    {
        return $this->group;
    }

    public function getAnalyticsParams()
    {
        return $this->analyticsParams;
    }

    public function getTemplateVariables()
    {
        return $this->templateVariables;
    }

    public function registerLead()
    {
        return $this->registerLead;
    }

    private function generateSubject($subject, $params = [])
    {
        if (is_string($subject)) {
            return $subject;
        }

        $format = $subject[0];
        $keys = $subject[1];

        $args = [];
        foreach ($keys as $key) {
            if (!isset($params[$key])) {
                throw new \Exception("Parameter '{$key}' needed for subject string creation");
            }

            array_push($args, $params[$key]);
        }

        return vsprintf($format, $args);
    }

}
