<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
$user = Yii::$app->user;
$urlManager = Yii::$app->urlManager;
$baseUrl = $urlManager->baseUrl;

$this->params['subheader'] = '<div id="Subheader" style="padding:190px 0 100px;">
                <div class="container">
                    <div class="column one">
                        <h1 class="title">Signup</h1>
                    </div>
                </div>
            </div>';
?>
<div class="section mcb-section " style="padding-top:70px; padding-bottom:30px; background-image:url(<?= $baseUrl;?>/images/home_hotel2_pattern.png); background-repeat:repeat; background-position:center; ">
	<div class="section_wrapper mcb-section-inner">
		<div class="wrap mcb-wrap one clearfix">
			<!-- One Third (1/3) Column -->
			<div class="column mcb-column one-third column_placeholder">
				<div class="placeholder">
					<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
						<?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
						<?= $form->field($model, 'username')->textInput() ?>
						<?= $form->field($model, 'email') ?>
						<?= $form->field($model, 'phone')->textInput() ?>
						<?= $form->field($model, 'password')->passwordInput() ?>
						<?= $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::classname()) ?>
						<div class="form-group">
							<?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
						</div>
					<?php ActiveForm::end(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
