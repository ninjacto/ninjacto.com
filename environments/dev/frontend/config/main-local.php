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
            'enableStrictParsing' => false,
            'suffix' => '.html',
            'rules' => [
                'http://ninjacto.dev/home' => '/blog/index',
                'http://ninjacto.dev/about' => '/site/about',
                'http://ninjacto.dev/contact' => '/site/contact',
                'http://ninjacto.dev/hire' => '/site/hire',
                'http://ninjacto.dev/blog/<slug>' => '/blog/view',
                'http://ninjacto.dev/blog' => '/blog/index',
                'http://ninjacto.dev/portfolio/<slug>' => 'site/portfolio',
                'http://ninjacto.dev/sitemap/<type>' => 'site/sitemap',
                'http://ninjacto.dev/<_m>/<_c>/<_a>' => '<_m>/<_c>/<_a>',
                'http://ninjacto.dev/<_c>/<_a>' => '<_c>/<_a>',
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
