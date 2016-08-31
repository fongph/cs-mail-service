<?php

require 'vendor/autoload.php';

$config = require 'config.php';

$logger = new \Monolog\Logger("log");
$logger->pushHandler(new \Monolog\Handler\ErrorLogHandler());

$connection = new PhpAmqpLib\Connection\AMQPConnection($config['queue']['host'], $config['queue']['port'], $config['queue']['user'], $config['queue']['password']);
$queueChannel = $connection->channel();

$transport = new Swift_SmtpTransport($config['smtp']['host'], $config['smtp']['port'], $config['smtp']['security']);

$transport->setUsername($config['smtp']['user'])
        ->setPassword($config['smtp']['password']);

$mailer = Swift_Mailer::newInstance($transport);

$processor = new CS\MailService\Processor($queueChannel, $config['queue']['providerKey'], $config['queue']['failedKey'], $mailer, $logger);
$processor->startConsume();
