<?php

require 'vendor/autoload.php';
$config = require 'config.development.php';

$logger = new \Monolog\Logger("mail-service");

$logger->pushHandler(new \Monolog\Handler\StreamHandler('logs/main.log'));
$logger->pushHandler(new \Monolog\Handler\ErrorLogHandler());

Monolog\ErrorHandler::register($logger);

$connection = new PhpAmqpLib\Connection\AMQPConnection($config['queue']['host'], $config['queue']['port'], $config['queue']['user'], $config['queue']['password']);
$queueChannel = $connection->channel();

$messageProvider = new \Swarrot\Broker\MessageProvider\PhpAmqpLibMessageProvider($queueChannel, $config['queue']['providerKey']);

$options['ssl']['verify_peer'] = false;
$options['ssl']['verify_peer_name'] = false;

$transport = new Swift_SmtpTransport($config['smtp']['host'], $config['smtp']['port'], $config['smtp']['security']);

$transport->setUsername($config['smtp']['user'])
        ->setPassword($config['smtp']['password'])
        ->setStreamOptions($options);

$mailer = Swift_Mailer::newInstance($transport);

CS\MailService\ErrorToExceptionConverter::init();

$stack = new \Swarrot\Processor\Stack\Builder();

$stack->push('Swarrot\Processor\SignalHandler\SignalHandlerProcessor', $logger)
        ->push('Swarrot\Processor\MaxMessages\MaxMessagesProcessor', $logger)
        ->push('Swarrot\Processor\ExceptionCatcher\ExceptionCatcherProcessor', $logger)
        ->push('CS\MailService\MessageDebugProcessor', $logger)
        ->push('Swarrot\Processor\Ack\AckProcessor', $messageProvider, $logger);

$processor = $stack->resolve(new CS\MailService\Processor($mailer, $logger));

$consumer = new Swarrot\Consumer($messageProvider, $processor, null, $logger);
$consumer->consume([
    'requeue_on_error' => true,
    'max_messages' => 100,
    'db_host' => $config['db']['host'],
    'db_database' => $config['db']['database'],
    'db_user' => $config['db']['user'],
    'db_password' => $config['db']['password']
]);
