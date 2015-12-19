<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            'uploadDir' => '@frontend/web/uploads',
            'uploadUrl' => '@frontendUrl/uploads',
            'imageAllowExtensions'=>['jpg','jpeg','png','gif']
        ],
        'markdown' => [
            // the module class
            'class' => 'kartik\markdown\Module',

            // the controller action route used for markdown editor preview
            'previewAction' => '/markdown/parse/preview',

            // the controller action route used for downloading the markdown exported file
            'downloadAction' => '/markdown/parse/download',

            // the list of custom conversion patterns for post processing
            'customConversion' => [
                '<table>' => '<table class="table table-bordered table-striped">'
            ],

            // whether to use PHP SmartyPantsTypographer to process Markdown output
            'smartyPants' => false,
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
