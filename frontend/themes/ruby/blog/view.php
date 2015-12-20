<?php
/**
 * @var $this yii\web\View
 * @var $model common\models\Post
 */
?>
<div class="blog-view">
    <div class="row">
        <div class="col-md-12">
            <img src="<?= yii::$app->params['cdn'].$model->poster->filename;?>" class="animated fadeInUp">

            <h3 class="animated fadeInDown"><?= $model->title; ?> <small><span><?= $model->is_lts?'LTS':''; ?></span></small></h3>

            <div class="blogMeta animated fadeInDown">
                <p>By: <a href="#"><?= $model->user->name; ?></a> | Tags: <?= implode(',', $model->getTagValues(true)); ?> | Comments: <a href="#"><?= count($model->comments); ?></a></p>
            </div>
            <div class="animated fadeInDown">
                <?= kartik\markdown\Markdown::convert($model->body); ?>
            </div>
        </div>
    </div>
    <div class="shareit"><div class="note">
            <p>SPREAD THE WORLD</p>
            <div class="social-box"><a href="#"><i class="fa fa-facebook"></i></a></div>
            <div class="social-box"><a href="#"><i class="fa fa-twitter"></i></a></div>
            <div class="social-box"><a href="#"><i class="fa fa-dribbble"></i></a></div>
            <div class="social-box"><a href="#"><i class="fa fa-google-plus"></i></a></div>
            <div class="social-box"><a href="#"><i class="fa fa-foursquare"></i></a></div>
            <div class="social-box"><a href="#"><i class="fa fa-skype"></i></a></div>
            <div class="social-box"><a href="#"><i class="fa fa-linkedin"></i></a></div>
        </div>
    </div>
    <div id="comment" class="comments-wrapper">
        <h3 class="comment-title">Comments</h3>
        <ol class="commentlist">
            <?php foreach($model->comments as $comment):?>
                <?php if(empty($comment->parentComment)): ?>
            <li class="comment">
                <article class="media"><div class="note"></div>
                    <a class="pull-left" href="#">
                        <img class="media-object" width="87" height="87" src="<?= yii::$app->params['cdn'].'avatar.jpg';?>" alt="...">
                    </a>
                    <div class="media-body">
                        <h5 class="media-heading"><?= $comment->name; ?></h5>
                        <p class="comment-date"><?= date('F j, Y \a\\t g:i a', strtotime($comment->created_at))?></p>
                        <p><?= $comment->body; ?></p>
                    </div>
                    <p class="reply">Reply</p>
                </article>
                    <?php foreach($model->comments as $childComment):?>
                        <?php if(!empty($childComment->parentComment) && $childComment->parentComment->id == $comment->id): ?>
                <ul class="children">
                    <li class="comment">
                        <article class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" width="87" height="87" src="<?= yii::$app->params['cdn'].'avatar.jpg';?>" alt="...">
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading"><?= $comment->name; ?></h5>
                                <p class="comment-date"><?= date('F j, Y \a\\t g:i a', strtotime($comment->created_at))?></p>
                                <p><?= $comment->body; ?></p>
                            </div>
                            <p class="reply">Reply</p>
                        </article>
                    </li>
                </ul>
                    <?php endif; ?>
                <?php endforeach; ?>
            </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ol>

        <div id="commentrespond" class="comment-respond">
            <h3 class="subTitle">LEAVE A <span>COMMENT</span></h3>
            <p>veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni Nemo enim ipsam voluptatem quia voluptas sit aspernatur .</p>
            <form role="form" id="commentform" class="comment-form" method="post" action="#">
                <div class="col-md-4 form-group">
                    <input type="name" class="required form-control" name="name" id="inputName" placeholder="Name">
                </div>
                <div class="col-md-4 form-group">
                    <input type="email" class="required form-control" name="email" id="inputEmail" placeholder="Email Address">
                </div>
                <div class="col-md-4 form-group">
                    <input type="text" class="required form-control" name="subject" id="inputSubject" placeholder="Web Site">
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 form-group">
                    <textarea class="required form-control" rows="11" name="comment" id="inputComment"></textarea>
                </div>
                <button type="submit" name="submit" value="SUBMIT" class="buton b_asset buton-2 buton-mini">SUBMIT</button>
            </form>
        </div>
    </div>
    <div class="mainFooter animated fadeInUp">
        <div class="col-md-4">
            <h3>OUR STORY</h3>
            <div class="text-widget">
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Aldus PageMaker including versions It uses a dictionary of over Power.</p>
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