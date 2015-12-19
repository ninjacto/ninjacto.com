<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bg-map">
    <div class="row">
        <div class="container">
            <div class="col-md-12 animated fadeInDown">
                <img src="/uploads/contact.jpg" alt="">
            </div>
        </div>
    </div>
</div>
<div class="site-contact">
    <div class="row">
        <div class="container">
            <div class="col-md-8 animated fadeInLeft">
                <h3 class="subTitle-contact">GET <span>IN TOUCH</span></h3>
                <p></p>
                <div class="contact-form">
                    <?php $form = ActiveForm::begin([
                        'id' => 'contact-form',
                        'layout' => 'horizontal',
                        'fieldConfig' => [
                            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                            'horizontalCssClasses' => [
                                'label' => 'col-sm-2 col-md-4',
                                'offset' => 'col-sm-offset-2 col-md-4',
                                'wrapper' => 'col-sm-10 col-md-8',
                                'error' => 'col-sm-10 col-md-8',
                                'hint' => 'col-sm-10 col-md-8',
                            ],
                        ],
                    ]); ?>
                    <div class="col-md-6">

                        <?= $form->field($model, 'name') ?>

                        <?= $form->field($model, 'subject') ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'email') ?>

                        <?= $form->field($model, 'website') ?>
                    </div>
                    <div class="col-md-12">
                        <?= $form->field($model, 'body',[
                            'horizontalCssClasses' => [
                                'label' => 'col-sm-2',
                                'offset' => 'col-sm-offset-2',
                                'wrapper' => 'col-sm-10',
                                'error' => 'col-sm-10',
                                'hint' => 'col-sm-10',
                            ],
                        ])->widget(\yii\redactor\widgets\Redactor::className(), [
                            'clientOptions' => [
                                'buttons' => ['format', 'bold', 'italic', 'deleted',
                                    'lists', 'image', 'file', 'link', 'horizontalrule'],
                                'plugins' => ['textdirection']
                            ]
                        ])?>

                        <?= $form->field($model, 'verifyCode',[
                            'horizontalCssClasses' => [
                                'label' => 'col-sm-2',
                                'offset' => 'col-sm-offset-2',
                                'wrapper' => 'col-sm-10',
                                'error' => 'col-sm-10',
                                'hint' => 'col-sm-10',
                            ],
                        ])->widget(Captcha::className(), [
                            'template' => '<div class="col-sm-3" style="padding-left: 0">{image}</div><div class="col-sm-9" style="padding-right: 0">{input}</div>',
                        ]) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-danger pull-right', 'name' => 'contact-button']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="col-md-4 animated fadeInRight">
                <h3 class="subTitle-contact">CONTACT <span>INFO</span></h3>
                <div class="contact-info">
                    <p><i class="vertec-telephone"></i> (+000) 0000 000 0000</p>
                    <p><i class="vertec-envelope"></i> info@ninjacto.com</p>
                    <p><i class="vertec-globe"></i> ninjacto.com</p>
                    <p><i class="vertec-clock2"></i> Mon - Sat 9:00am - 6:00pm (UTC)</p>
                    <p><i class="vertec-direction"></i> xxx xxxxx xxx ST</p>
                </div>
                <div class="contact-icons">
                    <a href="https://www.facebook.com/ramin.farmani"><div class="social-box"><i class="fa fa-facebook"></i></div></a>
                    <a href="https://twitter.com/ninjacto"><div class="social-box"><i class="fa fa-twitter"></i></div></a>
                    <a href="https://plus.google.com/+RaminFarmani"><div class="social-box"><i class="fa fa-google-plus"></i></div></a>
                    <a href="https://foursquare.com/raminfarmani"><div class="social-box"><i class="fa fa-foursquare"></i></div></a>
                    <a href="skype://ramin.farmani"><div class="social-box"><i class="fa fa-skype"></i></div></a>
                    <a href="https://ir.linkedin.com/in/ramin-farmani-2086b314"><div class="social-box"><i class="fa fa-linkedin"></i></div></a>
                </div>

            </div>
        </div>
    </div>
    <div class="copyright-section">
        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    <p>Copyright © 2015 Ninja CTO. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div>
