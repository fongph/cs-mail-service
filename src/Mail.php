<?php

namespace CS\MailService;

use Swift_Mailer;
use Swift_Message;

/**
 * Description of Mail
 *
 * @author orest
 */
class Mail {

    /**
     *
     * @var Swift_Message 
     */
    private $message;

    public function __construct(Request $request, TemplateEngine $templateEngine)
    {   
        $body = $templateEngine->render(
                $request->getMessageType(), $request->getTemplateVariables(), $request->getAnalyticsParams()
        );

        $this->message = new Swift_Message();
        $this->message->setSubject($request->getSubject())
                ->setFrom($request->getSender())
                ->setTo($request->getRecipient())
                ->setBody($body, 'text/html');

        if ($request->hasReplyTo()) {
            $this->message->setReplyTo($request->getReplyTo());
        }
    }

    /**
     * @return Swift_Message
     */
    public function getMessage() {
        return $this->message;
    }

    public function send(Swift_Mailer $mailer)
    {
        $result = $mailer->send($this->message);
        $mailer->getTransport()->stop();
        
        return $result;
    }

}
