<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'suffix' => '.html',
            'rules' => [
                'http://ninjacto.dev/' => 'site/index',
                'http://ninjacto.dev/home' => 'site/index',
                'http://ninjacto.dev/page/<url:\w+>' => 'site/page',
                'http://ninjacto.dev/post/<url:\w+>' => 'post/view',
                'http://ninjacto.dev/portfolio/<id:\d+>' => 'site/portfolio',
                'http://ninjacto.dev/<controller>/<action>' => '<controller>/<action>',
                'http://ninjacto.dev/admin/<controller>/<action>' => 'admin/<controller>/<action>',
            ],
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
