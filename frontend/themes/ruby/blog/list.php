<?php
/* @var $this yii\web\View */
/* @var $item common\models\Post */
use yii\widgets\ListView;
use yii\helpers\Url;

$this->title = 'Blog - Ninja CTO';
?>
<div class="blog-list">
    <div class="html_carousel animated fadeInDown">
        <div id="foo3">
            <?php foreach (\common\models\Post::getLatest(3) as $item): ?>
            <div class="slide">
                <img src="<?= Yii::$app->params['cdn'].'posters/'.$item->poster; ?>" alt="<?= $item->title; ?>"/>
                <div class="slide-intro">
                    <div class="container">
                        <div class="row">
                            <div class="span12">
                                <div class="blog-date hidden-xs"><p class="day"><?= date('j', strtotime($item->created_at)) ?></p>
                                    <p class="monthyear"><?= date('M Y', strtotime($item->created_at)) ?></p></div>
                                <div class="slide-excerpt">
                                    <a href="<?= Url::to(['/blog/view','slug'=>$item->slug])?>"><h4><?= $item->title; ?> <span><?= $item->is_lts?"LTS":""; ?></span></h4></a>
                                    <p class="hidden-xs"><?= $item->description; ?>...<?= \yii\helpers\Html::a('Read More',['blog/view','slug'=>$item->slug])?></p>
                                </div>
                                <div class="pull-left">
                                    <p class="blog-meta hidden-xs">
                                        By: <a href="#"><?= $item->user->name; ?></a> |
                                        Tags: <?= implode(',', $item->getTagValues(true)); ?> |
                                        Comments: <a href="#"><?= count($item->comments); ?></a> |
                                        Like: <a href="#"><?= $item->like; ?></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <div class="clearfix"></div>
        <div class="nextprev">
            <a class="prev" href="#">
                <div class="slidebox"><i class="fa fa-angle-left"></i></div>
            </a>
            <a class="next" href="#">
                <div class="slidebox"><i class="fa fa-angle-right"></i></div>
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="home-4-blog-content">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'itemView' => '_item',
            'summary' => '',
            'summary' => '',
            'viewParams' => [
                'fullView' => true,
                'context' => 'main-page',
                'count' => count($dataProvider),
            ],
            'pager' => [
                'class' => \kop\y2sp\ScrollPager::className(),
                'noneLeftText' => '',
                'spinnerSrc' => Yii::$app->params['cdn'].'themes/ruby/img/spinner.gif'
            ]
        ]);
        ?>
    </div>
    <div class="clearfix"></div>

    <div class="mainFooter-white">
        <div class="col-md-4">
            <h3>OUR STORY</h3>
            <div class="text-widget">
                <p></p>
            </div>
        </div>
        <div class="col-md-4">
            <h3>RECENT POSTS</h3>

            <div class="popular-post-widget">
                <?php foreach (\common\models\Post::getLatest(2) as $item): ?>
                    <article class="popular-post">
                        <img src="<?= Yii::$app->params['cdn'].'posters/'.$item->poster; ?>" alt="<?= $item->title; ?>">
                        <h6><?= \yii\helpers\Html::a($item->title,['blog/view','slug'=>$item->slug])?></h6>
                        <p class="popular-date">Posted <?= date('j F Y', strtotime($item->created_at)) ?></p>
                        <p class="popular-author"><a href="#">By <?= $item->user->name; ?></a></p>
                    </article>
                <?php endforeach;?>
            </div>
        </div>
        <div class="col-md-4">
            <h3>TWITTER</h3>
            <div class="flickr-widget">
                <a class="twitter-timeline" href="https://twitter.com/ninjacto" data-widget-id="677700415312502785"
                   data-chrome="noheader noborders transparent nofooter">
                    Tweets by @ninjacto
                </a>
            </div>
        </div>
    </div>
</div>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
