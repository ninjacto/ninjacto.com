<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $model \common\models\Post */
?>

<div class="col-md-4 <?php if($count==3 || ($index+3) == $count): ?>noborders<?php endif; ?>">
<div class="blog-box-4 animated fadeInLeft anim<?= ($index+1)%5 ?>">
    <a href="<?= Url::to(['/blog/view','slug'=>$model->slug])?>">
        <h3><?= Html::encode($model->title); ?> <span><?= (bool)$model->is_lts?"LTS":""; ?></span></h3>
        <img src="<?= Yii::$app->params['cdn'].'posters/'.$model->poster; ?>" alt="<?= Html::encode($model->title); ?>">
    </a>
    <div class="blogMeta">
        <p>
            By: <a href="#"><?= Html::encode($model->user->name); ?></a> |
            Tags: <?= Html::encode(implode(',', $model->getTagValues(true))); ?>, |
            Comments: <a href="#"><?= count($model->comments); ?></a>
        </p>
    </div>
    <div class="blogIntro">
        <p><?= $model->description; ?>...</p>
    </div>
    <span class="buton b_asset buton-2 buton-mini"><?= \yii\helpers\Html::a('Read More',['blog/view','slug'=>$model->slug])?></span>
    <div class="dateLike">
        <div class="date"><i class="fa fa-calendar"></i> <?= date('M j, Y', strtotime($model->created_at)) ?></div>
        <div class="postLike"><i class="fa fa-heart"></i> <?= $model->like; ?></div>
    </div>
</div>
</div>
