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
<body class="blog">
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
                                    <?= yii\helpers\Html::a('Blog',['/blog/index']);?>
                                </li>
                                <li>
                                    <?= yii\helpers\Html::a('ABOUT ME',['/site/about']);?>
                                </li>
                                <li>
                                    <?= yii\helpers\Html::a('CONTACT',['/site/contact']);?>
                                </li>
                                <li>
                                    <?= yii\helpers\Html::a('HIRE / DONATE ME!',['/site/contact']);?>
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
                        <div class="navigation-social-icons"><a href="/sitemap"><i class="vertec-rss"></i></a><p>RSS FEED</p></div>
                    </div>
                    <div class="navigation-copyright">
                        <p>Privacy Policy | Term and Conditions</p>
                        <p>Copyright © 2015 NinjaCTO. All rights reserved.</p>
                    </div>

                </aside>
            </div>
            <section class="mainContent blogPage">
                <?= Alert::widget() ?>
                <?= $content ?>

            </section>
        </div>
    </div>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
