<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\RubyAsset;
use common\widgets\Alert;

RubyAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <div id="qLoverlay"><div class="loadLogo"><img class="spinner" src="<?= $this->theme->getUrl('img/logo.png')?>"></div></div>
    <?php $this->beginBody() ?>
    <div id="vertec-layout">
        <div class="mobileNav">
            <div class="logo">
                <a href="#"><img src="<?= $this->theme->getUrl('img/logo.png')?>" alt="NinjaCTO"></a>
            </div>
            <div class="mobileClick">
                <i class="fa fa-align-justify"></i>
            </div>
        </div>
        <div class="siteWrapper">
            <div class="hideHeader"><i class="fa fa-angle-left"></i></div>
            <div class="header header1 animated fadeIn">
                <header class="mainHeader">
                    <div class="closeMobile visible-xs visible-sm">
                        <i class="fa fa-times"></i>
                    </div>
                    <div class="logo visible-md visible-lg">
                        <a href="#"><img src="<?= $this->theme->getUrl('img/logo.png')?>" alt="NinjaCTO"></a>
                    </div>
                    <nav class="mainNav">
                        <div id="dl-menu" class="dl-menuwrapper">
                            <button class="dl-trigger">Open Menu</button>
                            <ul class="dl-menu dl-menuopen">
                                <li>
                                    <a href="#">Blog</a>
                                    <ul class="dl-submenu">
                                        <li>
                                            <a href="#">Server</a>
                                            <ul class="dl-submenu">
                                                <li>
                                                    <a href="#">Linux</a>
                                                    <ul class="dl-submenu">
                                                        <li><a href="#">Debian Based</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Server</a>
                                                    <ul class="dl-submenu">
                                                        <li><a href="#">Nginx</a></li>
                                                        <li><a href="#">Apache</a></li>
                                                        <li><a href="#">HAProxy</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Cloud</a>
                                                    <ul class="dl-submenu">
                                                        <li><a href="#">AWS</a></li>
                                                        <li><a href="#">Parse.com</a></li>
                                                        <li><a href="#">algolia</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Database</a>
                                                    <ul class="dl-submenu">
                                                        <li><a href="#">MySQL</a></li>
                                                        <li><a href="#">Percona</a></li>
                                                        <li><a href="#">MongoDB</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Cache</a>
                                                    <ul class="dl-submenu">
                                                        <li><a href="#">Redis</a></li>
                                                        <li><a href="#">Memcached</a></li>
                                                        <li><a href="#">OpCache</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Queue/Message</a>
                                                    <ul class="dl-submenu">
                                                        <li><a href="#">RabbitMQ</a></li>
                                                        <li><a href="#">ZeroMQ</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Backend Development</a>
                                            <ul class="dl-submenu">
                                                <li><a href="#">PHP</a></li>
                                                <li><a href="#">Yii Framework</a></li>
                                                <li><a href="#">Node.js</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Frontned Development</a>
                                            <ul class="dl-submenu">
                                                <li><a href="#">UX/UI</a></li>
                                                <li><a href="#">Angular.js</a></li>
                                                <li><a href="#">Backbone.js</a></li>
                                                <li><a href="#">Require.js</a></li>
                                                <li><a href="#">handlebars.js</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <?= yii\helpers\Html::a('ABOUT ME',['site/about']);?>
                                </li>
                                <li>
                                    <?= yii\helpers\Html::a('PORTFOLIO',['site/portfolio']);?>
                                </li>
                                <li>
                                    <?= yii\helpers\Html::a('CONTACT',['site/contact']);?>
                                </li>
                                <li>
                                    <?= yii\helpers\Html::a('HIRE ME!',['site/contact']);?>
                                </li>
                            </ul>
                        </div><!-- /dl-menuwrapper -->
                    </nav>
                </header>
                <aside class="mainSidebar">
                    <div class="search">
                        <form method="get" action="#">
                            <input type="text" name="s" class="search-query" placeholder="Search here...">
                            <button class="search-icon" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="navigation-social">
                        <h3>WE ARE SOCIAL</h3>
                        <div class="navigation-social-icons"><a href="#"><i class="vertec-face"></i></a><p>FB FANS</p></div>
                        <div class="navigation-social-icons"><a href="https://twitter.com/ninjacto"><i class="vertec-tweet"></i></a><p>FOLLOWERS</p></div>
                        <div class="navigation-social-icons"><a href="#"><i class="vertec-youtube"></i></a><p>Screencasts</p></div>
                        <div class="navigation-social-icons"><a href="https://twitter.com/ninjacto"><i class="vertec-tweet"></i></a><p>FOLLOWERS</p></div>
                        <div class="navigation-social-icons"><a href="/sitemap"><i class="vertec-rss"></i></a><p>RSS FEED</p></div>
                    </div>
                    <div class="navigation-copyright">
                        <p>Privacy Policy | Term and Conditions</p>
                        <p>Copyright © 2015 NinjaCTO. All rights reserved.</p>
                    </div>

                </aside>
            </div>
            <section class="mainContent">
                <?= Alert::widget() ?>
                <?= $content ?>
            </section>
        </div>
    </div>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
