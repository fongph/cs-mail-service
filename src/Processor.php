<?php

namespace CS\MailService;

use Swarrot\Processor\ProcessorInterface;
use Swarrot\Processor\ConfigurableInterface;
use Swarrot\Broker\Message;
use Symfony\Component\Yaml\Yaml;
use Psr\Log\LoggerInterface;
use Swift_Mailer;
use PDO;

/**
 * Description of Processor
 *
 * @author orest
 */
class Processor implements ProcessorInterface, ConfigurableInterface {

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

    /**
     *
     * @var \PDO
     */
    private $db;

    public function __construct(Swift_Mailer $mailer, LoggerInterface $logger)
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

    public function process(Message $message, array $options)
    {
        $data = @json_decode($message->getBody(), true);

        if (!$data) {
            throw new \Exception("Message must be a valid JSON string");
        }

        $siteSettings = Yaml::parse(file_get_contents("settings/pumpic.yml"));

        $request = new Request($data, $siteSettings);

        $type = $request->getMessageType();
        $this->logger->addInfo("Message with type '{$type}' received");

        $this->createDatabaseConnection($options);

        if (!$this->mustSend($request)) {
            unset($this->db);
            $this->logger->info("Do not send message '{$type}' for user #{$request->getUser()}");
            return true;
        }

        try {
            $this->db->beginTransaction();

            $this->logMailToDatabase($request);
            $this->pushLead($request);
            $result = $this->sendEmail($request);

            $this->logger->addInfo("Message '{$type}' sended", ['result' => $result]);

            $this->db->commit();
        } catch (\Throwable $e) {
            $this->handleException($e);
        } catch (\Exception $e) {
            $this->handleException($e);
        }

        unset($this->db);
        return true;
    }

    private function handleException($exception)
    {
        unset($this->db);

        throw $exception;
    }

    private function sendEmail($request)
    {
        $templateEngine = new TemplateEngine($request->getSite(), $request->getLocale());
        $mail = new Mail($request, $templateEngine);
        return $mail->send($this->mailer);
    }

    private function mustSend(\CS\MailService\Request $request)
    {
        if ($request->getGroup() == null) {
            return true;
        }

        if ($request->getUser() == null) {
            return true;
        }

        /**
         * @todo use cs-users library with incapsulated options names
         */
        $user = $this->db->quote($request->getUser());
        $optionKey = $this->db->quote('mail-type-' . $request->getGroup() . '-unsubscribed');
        $value = $this->db->query("SELECT `value` FROM `users_options` WHERE `user_id` = {$user} AND `option` = {$optionKey} LIMIT 1")->fetchColumn();

        if ($value > 0) {
            return false;
        }

        return true;
    }

    public function logMailToDatabase(Request $request)
    {
        if ($request->getUser() == null) {
            $this->logger->info("Do not save user email inforamtion to database");
            return;
        }

        $escapedUserId = $this->db->quote($request->getUser());
        $escapedType = $this->db->quote($request->getMessageType());

        $this->db->exec("INSERT INTO `users_emails_log` SET `user_id` = {$escapedUserId}, `type` = {$escapedType}");
        $this->logger->info("Save user email inforamtion to database");
    }

    public function pushLead(Request $request)
    {
        if (!$request->registerLead()) {
            $this->logger->info("Do not save lead for message");
            return;
        }

        $data = array(
            'type' => $request->getMessageType(),
            'email' => $request->getRecipient(),
            'params' => $request->getParams()
        );

        if ($request->getUser() > 0) {
            $data['userId'] = $request->getUser();
        }

        $serializedData = $this->db->quote(json_encode($data));

        $eventName = $this->db->quote('email-sended');

        if ($request->getUser() > 0) {
            $userId = $this->db->quote($request->getUser());
            $this->db->exec("INSERT INTO `jira_logs` SET `user_id` = {$userId}, `event` = {$eventName}, `data` = {$serializedData}");
        } else {
            $email = $this->db->quote($request->getRecipient());
            $this->db->exec("INSERT INTO `jira_logs` SET `email` = {$email}, `event` = {$eventName}, `data` = {$serializedData}");
        }

        $this->logger->info("Save lead for message");
    }

    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolver $resolver)
    {
        $resolver->setRequired([
            'db_host', 'db_database', 'db_user', 'db_password'
        ]);
    }

    private function createDatabaseConnection($options)
    {
        $connectionOptions = [
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8;',
            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $this->db = new PDO("mysql:host={$options['db_host']};port=3306;dbname={$options['db_database']}", $options['db_user'], $options['db_password'], $connectionOptions);
    }

}
