<?php
return [
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
                'http://ninjacto.com/' => 'site/index',
                'http://ninjacto.com/home' => 'site/index',
                'http://ninjacto.com/about' => 'site/about',
                'http://ninjacto.com/contact' => 'site/contact',
                'http://ninjacto.com/hire' => 'site/hire',
                'http://ninjacto.com/meeting' => 'site/meeting',
                'http://ninjacto.com/portfolio/<id:\d+>' => 'site/portfolio',
                'http://ninjacto.com/sitemap/<type:\w+>' => 'site/sitemap',
                'http://ninjacto.com/<_m>/<_c>/<_a>' => '<_m>/<_c>/<_a>',
                'http://ninjacto.com/<_c>/<_a>' => '<_c>/<_a>',
            ],
        ],
    ],
];
