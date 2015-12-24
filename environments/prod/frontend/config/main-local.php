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
            'enableStrictParsing' => false,
            'suffix' => '.html',
            'rules' => [
                'https://www.ninjacto.com/home' => '/blog/index',
                'https://www.ninjacto.com/about' => '/site/about',
                'https://www.ninjacto.com/contact' => '/site/contact',
                'https://www.ninjacto.com/hire' => '/site/hire',
                'https://www.ninjacto.com/blog/<slug>' => '/blog/view',
                'https://www.ninjacto.com/blog' => '/blog/index',
                'https://www.ninjacto.com/portfolio/<slug>' => 'site/portfolio',
                'https://www.ninjacto.com/sitemap/<type>' => 'site/sitemap',
                'https://www.ninjacto.com/<_m>/<_c>/<_a>' => '<_m>/<_c>/<_a>',
                'https://www.ninjacto.com/<_c>/<_a>' => '<_c>/<_a>',
            ],
        ],
    ],
];
