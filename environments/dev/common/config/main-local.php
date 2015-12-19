<?php
return [
    'aliases' => [
        '@frontend' => dirname(dirname(__DIR__)) . '/frontend',
        '@frontendUrl' => 'http://ninjacto.dev',
        '@backend' => dirname(dirname(__DIR__)) . '/backend',
        '@backendUrl' => 'http://admin5411.ninjacto.dev',
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=ninjacto',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
