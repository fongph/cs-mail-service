<?php

return [
    'sites' => [
        1 => 'pumpic'
    ],
    'defaultSite' => 'pumpic',
    'queue' => [
        'host' => $_ENV['QUEUE_HOST'],
        'port' => $_ENV['QUEUE_PORT'],
        'user' => $_ENV['QUEUE_USER'],
        'password' => $_ENV['QUEUE_PASSWORD'],
        'providerKey' => $_ENV['QUEUE_PROVIDER_KEY'],
        'failedKey' => $_ENV['QUEUE_FAILED_KEY']
    ],
    'smtp' => [
        'host' => $_ENV['SMTP_HOST'],
        'port' => $_ENV['SMTP_PORT'],
        'security' => $_ENV['SMTP_SECURITY'],
        'user' => $_ENV['SMTP_USER'],
        'password' => $_ENV['SMTP_PASSWORD']
    ],
    'db' => [
        'host' => $_ENV['DB_HOST'],
        'database' => $_ENV['DB_NAME'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];
