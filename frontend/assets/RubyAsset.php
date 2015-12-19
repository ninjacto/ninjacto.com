<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class RubyAsset extends AssetBundle
{
    public $basePath = '@webroot/themes/ruby';
    public $baseUrl = '@web/themes/ruby';
    public $css = [
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/animate.min.css',
        'css/menu.css',
        'css/github-gist.css',
        'css/icons.css',
        'css/main.css',
        'css/flexslider.css',
        'css/prettyPhoto.css',
        'css/darkula.css',
    ];
    public $js = [
        'js/jquery-ui.js',
        'js/modernizr.custom.js',
        'js/bootstrap.min.js',
        'js/imagesloaded.pkgd.min.js',
        'js/jquery.ba-throttle-debounce.min.js',
        'js/jquery.carouFredSel-6.2.1-packed.js',
        'js/jquery.dlmenu.js',
        'js/jquery.flexslider-min.js',
        'js/jquery.nicescroll.min.js',
        'js/jquery.prettyPhoto.js',
        'js/jquery.queryloader2.js',
        'js/masonry.pkgd.min.js',
        'js/highlight.pack.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
