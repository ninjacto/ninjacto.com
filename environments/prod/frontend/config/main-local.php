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
                'https://ninjacto.com/' => 'site/index',
                'https://ninjacto.com/home' => 'site/index',
                'https://ninjacto.com/about' => 'site/about',
                'https://ninjacto.com/contact' => 'site/contact',
                'https://ninjacto.com/hire' => 'site/hire',
                'https://ninjacto.com/meeting' => 'site/meeting',
                'https://ninjacto.com/portfolio/<id:\d+>' => 'site/portfolio',
                'https://ninjacto.com/sitemap/<type:\w+>' => 'site/sitemap',
                'https://ninjacto.com/<_m>/<_c>/<_a>' => '<_m>/<_c>/<_a>',
                'https://ninjacto.com/<_c>/<_a>' => '<_c>/<_a>',
            ],
        ],
    ],
];
