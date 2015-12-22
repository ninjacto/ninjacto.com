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
                'http://www.ninjacto.com/' => '/blog/index',
                'http://www.ninjacto.com/about' => '/site/about',
                'http://www.ninjacto.com/contact' => '/site/contact',
                'http://www.ninjacto.com/hire' => '/site/hire',
                'http://www.ninjacto.com/blog/<slug:\w+>' => '/blog/view',
                'http://www.ninjacto.com/blog' => '/blog/index',
                'http://www.ninjacto.com/portfolio/<id:\d+>' => 'site/portfolio',
                'http://www.ninjacto.com/sitemap/<type:\w+>' => 'site/sitemap',
                'http://www.ninjacto.com/<_m>/<_c>/<_a>' => '<_m>/<_c>/<_a>',
                'http://www.ninjacto.com/<_c>/<_a>' => '<_c>/<_a>',
            ],
        ],
    ],
];
