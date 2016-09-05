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
    private $subject;
    private $data;
    private $sender;
    private $analyticsParams = [];
    private $templateVariables = [];

    public function __construct($data, $siteSettings)
    {
        $this->site = $siteSettings['name'];
        $this->locale = $siteSettings['defaultLocale'];
        $this->data = $data;

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

        if (isset($data['params'])) {
            $this->subject = $this->generateSubject($templateSettings['subject'][$this->locale], $data['params']);
        } else {
            $this->subject = $this->generateSubject($templateSettings['subject'][$this->locale]);
        }

        /**
         * @todo read this configuration from local config (not from request) 
         * @todo remove support@pumpic.com hack
         */
        if (isset($data['email'])) {
            $this->sender = $data['email'];

            if ($this->sender == 'support@pumpic.com') {
                $this->sender = ['support@pumpic.com' => 'Pumpic.com'];
            }
        } elseif (isset($templateSettings['sender'])) {
            if (isset($templateSettings['senderName'])) {
                $this->sender = [$templateSettings['sender'] => $templateSettings['senderName']];
            } else {
                $this->sender = $templateSettings['sender'];
            }
        } else {
            throw new \Exception("Sender not defined");
        }

        if (isset($siteSettings['defaultAnalyticsParams'])) {
            $this->analyticsParams = $siteSettings['defaultAnalyticsParams'];
        }

        if (isset($templateSettings['analyticsCampaign'])) {
            $this->analyticsParams['campaign'] = $templateSettings['analyticsCampaign'];
        }

        if (isset($siteSettings['templatesVariables'])) {
            $this->templateVariables = $siteSettings['templatesVariables'];
        }

        $this->templateVariables = array_merge($this->templateVariables, [
            'params' => $data['params'],
            'title' => $this->subject
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

    public function getAnalyticsParams()
    {
        return $this->analyticsParams;
    }

    public function getTemplateVariables()
    {
        return $this->templateVariables;
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
