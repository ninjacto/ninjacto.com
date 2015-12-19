<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Series */

$this->title = 'Create Series';
$this->params['breadcrumbs'][] = ['label' => 'Series', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="series-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
