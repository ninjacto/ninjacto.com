<?php
return [
    'components' => [
        'aliases' => [
            '@frontend' => dirname(dirname(__DIR__)) . '/frontend',
            '@frontendUrl' => 'https://www.ninjacto.com',
            '@backend' => dirname(dirname(__DIR__)) . '/backend',
            '@backendUrl' => 'https://admin5411.ninjacto.com',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=ninjacto',
            'username' => 'root',
            'password' => 'AsXc3142##*^',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
    ],
];
