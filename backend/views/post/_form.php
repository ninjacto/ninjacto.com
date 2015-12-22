<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\daterange\DateRangePicker;
use dosamigos\switchinput\SwitchBox;
use dosamigos\selectize\SelectizeTextInput;
use kartik\markdown\MarkdownEditor;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'offset' => 'col-sm-offset-2',
                'wrapper' => 'col-sm-10',
                'error' => 'col-sm-10',
                'hint' => 'col-sm-10',
            ],
        ],
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'categories')->widget(Select2::classname(), [
        'value' => $model->isNewRecord ? [] : \common\models\Category::find()->select(['category.id'])->joinWith('posts')->where(['post.id'=>$model->id])->asArray()->all(), // initial value
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Category::find()->where(['is not','parent_id',null])->select(['id','title'])->asArray()->all(), 'id', 'title'),
        'options' => ['placeholder' => 'Categories', 'multiple' => true],
        'pluginOptions' => [
            'tags' => true,
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'poster')->fileInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'published_at',[
        'options'=>['class'=>'drp-container form-group'],
    ])->widget(DateRangePicker::classname(),[
        'model'=>$model,
        'attribute'=>'published_at',
        'convertFormat'=>true,
        'pluginOptions'=>[
            'timePicker'=>true,
            'timePickerIncrement'=>15,
            'locale'=>['format' => 'Y-m-d H:i:s'],
            'singleDatePicker'=>true,
            'showDropdowns'=>true
        ]
    ]) ?>

    <?= $form->field($model, 'body')->widget(MarkdownEditor::className(), [])?>

    <?= $form->field($model, 'is_lts')->widget(SwitchBox::className(),[
        'clientOptions' => [ 'size' => 'medium', 'onColor' => 'success', 'offColor' => 'danger' ]
    ]) ?>

    <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tagValues')->widget(SelectizeTextInput::className(), [
        'loadUrl' => ['post/tags'],
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'plugins' => ['remove_button'],
            'valueField' => 'title',
            'labelField' => 'title',
            'searchField' => ['title'],
            'create' => true,
        ],
    ])->hint('Use commas to separate tags') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
