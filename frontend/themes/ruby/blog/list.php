<?php
/* @var $this yii\web\View */
/* @var $item common\models\Post */
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
                                    <h4><?= $item->title; ?> <span><?= $item->is_lts?"LTS":""; ?></span></h4>
                                    <p class="hidden-xs"><?= $item->description; ?>...<?= \yii\helpers\Html::a('Read More',['blog/view','slug'=>$item->slug])?></p>
                                </div>
                                <div class="pull-left">
                                    <p class="blog-meta hidden-xs">
                                        By: <a href="#"><?= $item->user->name; ?></a> |
                                        Tags: <?= implode(',', $item->getTagValues(true)); ?> |
                                        Comments: <a href="#"><?= count($item->comments); ?></a>
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
        <div class="col-md-4">
            <div class="blog-box-4 animated fadeInLeft anim1">
                <h3>SIMPLE POST <span>WITH IMAGE</span></h3>
                <img src="content/portfolio/2.jpg" alt="simple post">
                <div class="blogMeta">
                    <p>By: <a href="#">admin</a> | Tags: <a href="#">Graphic</a>, <a href="#">web</a>, | Comments: <a
                            href="#">113</a></p>
                </div>
                <div class="blogIntro">
                    <p>Printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever
                        since the 1500s, the when an unknown printer took a galley of type and scrambled it to make a
                        type specimen book</p>
                </div>
                <span class="buton b_asset buton-2 buton-mini"><a href="#">READ MORE</a></span>
                <div class="dateLike">
                    <div class="date"><i class="fa fa-calendar"></i> Feb 10, 2014</div>
                    <div class="postLike"><i class="fa fa-heart"></i> 09</div>
                </div>
            </div>
            <div class="blog-box-4 animated fadeInLeft anim4">
                <h3>ANOTHER POST <span>WITH IMAGE</span></h3>
                <img src="content/blog9.jpg" alt="simple post">
                <div class="blogMeta">
                    <p>By: <a href="#">admin</a> | Tags: <a href="#">Graphic</a>, <a href="#">web</a>, | Comments: <a
                            href="#">113</a></p>
                </div>
                <div class="blogIntro">
                    <p>Printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever
                        since the 1500s</p>
                </div>
                <span class="buton b_asset buton-2 buton-mini"><a href="#">READ MORE</a></span>
                <div class="dateLike">
                    <div class="date"><i class="fa fa-calendar"></i> Feb 10, 2014</div>
                    <div class="postLike"><i class="fa fa-heart"></i> 09</div>
                </div>
            </div>
            <div class="blog-box-4 animated fadeInLeft anim3">
                <h3>LOTS OF <span>POSSIBILITIES</span></h3>
                <img src="content/blog2.jpg" alt="simple post">
                <div class="blogMeta">
                    <p>By: <a href="#">admin</a> | Tags: <a href="#">Graphic</a>, <a href="#">web</a>, | Comments: <a
                            href="#">113</a></p>
                </div>
                <div class="blogIntro">
                    <p>Printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever
                        since the 1500s </p>
                </div>
                <span class="buton b_asset buton-2 buton-mini"><a href="#">READ MORE</a></span>
                <div class="dateLike">
                    <div class="date"><i class="fa fa-calendar"></i> Feb 10, 2014</div>
                    <div class="postLike"><i class="fa fa-heart"></i> 09</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="blog-box-4 animated fadeInLeft anim2">
                <h3>VERTEC <span>WELCOMES YOU</span></h3>
                <img src="content/portfolio/11.jpg" alt="simple post">
                <div class="blogMeta">
                    <p>By: <a href="#">admin</a> | Tags: <a href="#">Graphic</a>, <a href="#">web</a>, | Comments: <a
                            href="#">113</a></p>
                </div>
                <div class="blogIntro">
                    <p>Printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever
                        since the 1500s, the when an unknown printer took a galley of type and the when an unknown
                        printer took a galley of type scrambled it to make a type specimen book ... </p>
                </div>
                <span class="buton b_asset buton-2 buton-mini"><a href="#">READ MORE</a></span>
                <div class="dateLike">
                    <div class="date"><i class="fa fa-calendar"></i> Feb 10, 2014</div>
                    <div class="postLike"><i class="fa fa-heart"></i> 09</div>
                </div>
            </div>
            <div class="blog-box-4 animated fadeInLeft anim5">
                <h3>AWESOME POST <span>WITH IMAGE</span></h3>
                <img src="content/portfolio/5.jpg" alt="simple post">
                <div class="blogMeta">
                    <p>By: <a href="#">admin</a> | Tags: <a href="#">Graphic</a>, <a href="#">web</a>, | Comments: <a
                            href="#">113</a></p>
                </div>
                <div class="blogIntro">
                    <p>Printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever
                        since the 1500s, the when an unknown printer took a galley of type and the when an unknown
                        printer took a galley of type scrambled it to make a type specimen book ...</p>
                </div>
                <span class="buton b_asset buton-2 buton-mini"><a href="#">READ MORE</a></span>
                <div class="dateLike">
                    <div class="date"><i class="fa fa-calendar"></i> Feb 10, 2014</div>
                    <div class="postLike"><i class="fa fa-heart"></i> 09</div>
                </div>
            </div>
            <div class="blog-box-4 animated fadeInLeft anim5">
                <h3>COOL <span>ANIMATIONS</span></h3>
                <img src="content/portfolio/3.jpg" alt="simple post">
                <div class="blogMeta">
                    <p>By: <a href="#">admin</a> | Tags: <a href="#">Graphic</a>, <a href="#">web</a>, | Comments: <a
                            href="#">113</a></p>
                </div>
                <div class="blogIntro">
                    <p>Printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever
                        since the 1500s, the when an unknown printer took a galley of type and the when an unknown
                        printer took a galley</p>
                </div>
                <span class="buton b_asset buton-2 buton-mini"><a href="#">READ MORE</a></span>
                <div class="dateLike">
                    <div class="date"><i class="fa fa-calendar"></i> Feb 10, 2014</div>
                    <div class="postLike"><i class="fa fa-heart"></i> 09</div>
                </div>
            </div>
        </div>
        <div class="col-md-4 no-border">
            <div class="blog-box-4 animated fadeInLeft anim3">
                <h3>FAST AND <span>EASY</span></h3>
                <img src="content/portfolio/4.jpg" alt="simple post">
                <div class="blogMeta">
                    <p>By: <a href="#">admin</a> | Tags: <a href="#">Graphic</a>, <a href="#">web</a>, | Comments: <a
                            href="#">113</a></p>
                </div>
                <div class="blogIntro">
                    <p>Printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever
                        since the 1500s, the when an unknown printer took a galley of type and scrambled it to make a
                        type specimen book ...</p>
                </div>
                <span class="buton b_asset buton-2 buton-mini"><a href="#">READ MORE</a></span>
                <div class="dateLike">
                    <div class="date"><i class="fa fa-calendar"></i> Feb 10, 2014</div>
                    <div class="postLike"><i class="fa fa-heart"></i> 09</div>
                </div>
            </div>
            <div class="blog-box-4 animated fadeInLeft anim5">
                <h3>CLEAN CODED <span>TEMPLATE</span></h3>
                <img src="content/portfolio/7.jpg" alt="simple post">
                <div class="blogMeta">
                    <p>By: <a href="#">admin</a> | Tags: <a href="#">Graphic</a>, <a href="#">web</a>, | Comments: <a
                            href="#">113</a></p>
                </div>
                <div class="blogIntro">
                    <p>Printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever
                        since the 1500s, the when an unknown printer took a galley of type and</p>
                </div>
                <span class="buton b_asset buton-2 buton-mini"><a href="#">READ MORE</a></span>
                <div class="dateLike">
                    <div class="date"><i class="fa fa-calendar"></i> Feb 10, 2014</div>
                    <div class="postLike"><i class="fa fa-heart"></i> 09</div>
                </div>
            </div>
            <div class="blog-box-4 animated fadeInLeft anim5">
                <h3>UNLIMITED <span>COLORS</span></h3>
                <img src="content/blog1.jpg" alt="simple post">
                <div class="blogMeta">
                    <p>By: <a href="#">admin</a> | Tags: <a href="#">Graphic</a>, <a href="#">web</a>, | Comments: <a
                            href="#">113</a></p>
                </div>
                <div class="blogIntro">
                    <p>Printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever
                        since the 1500s, the when an unknown printer took a galley of type and scrambled it to make a
                        type specimen book ...</p>
                </div>
                <span class="buton b_asset buton-2 buton-mini"><a href="#">READ MORE</a></span>
                <div class="dateLike">
                    <div class="date"><i class="fa fa-calendar"></i> Feb 10, 2014</div>
                    <div class="postLike"><i class="fa fa-heart"></i> 09</div>
                </div>
            </div>
        </div>

    </div>
    <div class="clearfix"></div>

    <div class="mainFooter-white">
        <div class="col-md-4">
            <h3>OUR STORY</h3>
            <div class="text-widget">
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                    printer took a galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                    sheets containing Lorem Aldus PageMaker including versions It uses a dictionary of over
                    Power.</p>
            </div>
        </div>
        <div class="col-md-4">
            <h3>RECENT POSTS</h3>

            <div class="popular-post-widget">
                <article class="popular-post">
                    <img src="content/footer1.jpg" alt="vertec">
                    <h6><a href="#">Sample Post with Standard Image &amp; Video</a></h6>
                    <p class="popular-date">Posted 13 September 2013</p>
                    <p class="popular-author"><a href="#">By Admin</a></p>
                </article>
                <article class="popular-post">
                    <img src="content/footer2.jpg" alt="vertec">
                    <h6><a href="#">Sample Post with Standard Image &amp; Video</a></h6>
                    <p class="popular-date">Posted 13 September 2013</p>
                    <p class="popular-author"><a href="#">By Admin</a></p>
                </article>
            </div>
        </div>
        <div class="col-md-4">
            <h3>FLICKR WIDGET</h3>
            <div class="flickr-widget">
                <a href="#"><img src="content/flickr1.jpg" alt="vertec"></a>
                <a href="#"><img src="content/flickr2.jpg" alt="vertec"></a>
                <a href="#"><img src="content/flickr3.jpg" alt="vertec"></a>
                <a href="#"><img src="content/flickr4.jpg" alt="vertec"></a>
                <a href="#"><img src="content/flickr5.jpg" alt="vertec"></a>
                <a href="#"><img src="content/flickr6.jpg" alt="vertec"></a>
                <a href="#"><img src="content/flickr7.jpg" alt="vertec"></a>
                <a href="#"><img src="content/flickr8.jpg" alt="vertec"></a>
            </div>
        </div>
    </div>
</div>