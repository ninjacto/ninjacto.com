<?php
/**
 * @var $this yii\web\View
 * @var $post common\models\Post
 * @var $comment common\models\Comment
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use kartik\markdown\MarkdownEditor;
?>
<div class="blog-view container">
    <div class="row">
        <div class="col-md-12">
            <img src="<?= yii::$app->params['cdn'].'posters/'.$post->poster;?>" class="animated fadeInUp">
            <h3 class="animated fadeInDown"><?= $post->title; ?> <small><span><?= $post->is_lts?'LTS':''; ?></span></small></h3>

            <div class="blogMeta animated fadeInDown">
                <p>
                    By: <a href="#"><?= $post->user->name; ?></a> |
                    Tags: <?= implode(',', $post->getTagValues(true)); ?> |
                    Comments: <a href="#"><?= count($post->comments); ?></a> |
                    Like: <a href="#"><?= $post->like; ?></a>
                </p>
            </div>
            <div class="animated fadeInDown body">
                <?= kartik\markdown\Markdown::convert($post->body); ?>
            </div>
        </div>
    </div>
    <div class="shareit">
        <div class="note">
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
            <?php foreach($post->comments as $comment):?>
                <?php if(empty($comment->parentComment)): ?>
            <li class="comment">
                <article class="media"><div class="note"></div>
                    <a class="pull-left" href="#">
                        <?= \cebe\gravatar\Gravatar::widget([
                            'email' => $comment->email,
                            'options' => ['alt' => $comment->name,'class'=>'media-object'],
                            'size' => 87
                        ]);?>
                    </a>
                    <div class="media-body">
                        <h5 class="media-heading"><?= $comment->name; ?></h5>
                        <p class="comment-date"><?= date('F j, Y \a\\t g:i a', strtotime($comment->created_at))?></p>
                        <p><?= kartik\markdown\Markdown::convert($comment->body); ?></p>
                    </div>
                    <p class="reply">Reply</p>
                </article>
                    <?php foreach($post->comments as $childComment):?>
                        <?php if(!empty($childComment->parentComment) && $childComment->parentComment->id == $comment->id): ?>
                <ul class="children">
                    <li class="comment">
                        <article class="media">
                            <a class="pull-left" href="#">
                                <?= \cebe\gravatar\Gravatar::widget([
                                    'email' => $comment->email,
                                    'options' => ['alt' => $comment->name,'class'=>'media-object'],
                                    'size' => 87
                                ]);?>
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading"><?= $comment->name; ?></h5>
                                <p class="comment-date"><?= date('F j, Y \a\\t g:i a', strtotime($comment->created_at))?></p>
                                <p><?= kartik\markdown\Markdown::convert($comment->body); ?></p>
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
            <p></p>
            <?php $form = ActiveForm::begin([
                'id' => 'comment-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        'label' => '',
                        'offset' => '',
                        'wrapper' => 'col-sm-12',
                        'error' => 'col-sm-12',
                        'hint' => 'col-sm-12',
                    ],
                ],
            ]); ?>
            <?= $form->field($comment, 'post_id')->hiddenInput(['value'=>$post->id])->label(false) ?>
            <div class="col-md-6">
                <?= $form->field($comment, 'name', ['inputOptions' => ['placeholder'=>'Name']])->label(false) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($comment, 'email', ['inputOptions' => ['placeholder'=>'CAPTCHA Code',]])->label(false) ?>
            </div>

            <div class="col-md-12">
                <?= $form->field($comment, 'body', ['inputOptions' => ['placeholder'=>'Comment Body']])->label(false)->widget(MarkdownEditor::className(), [])?>
                <?= $form->field($comment, 'verifyCode',[
                    'inputOptions' => ['placeholder'=>'CAPTCHA Code',],
                    'horizontalCssClasses' => [
                        'label' => 'col-sm-6',
                        'offset' => 'col-sm-offset-6',
                        'wrapper' => 'col-sm-6',
                        'error' => 'col-sm-6',
                        'hint' => 'col-sm-6',
                    ],
                ])->label(false)->widget(Captcha::className(), [
                    'template' => '<div class="col-sm-9" style="padding-left: 0">{input}</div><div class="col-sm-3" style="padding-right: 0">{image}</div>',
                ]) ?>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'buton b_asset buton-2 buton-mini pull-right', 'name' => 'contact-button']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="mainFooter animated fadeInUp">
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
