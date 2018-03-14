<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
$user = Yii::$app->user;
$urlManager = Yii::$app->urlManager;
$baseUrl = $urlManager->baseUrl;

$this->params['subheader'] = '<div id="Subheader" style="padding:190px 0 100px;">
                <div class="container">
                    <div class="column one">
                        <h1 class="title">Request Password Reset</h1>
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
					<?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
						<?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
						<div class="form-group">
							<?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
						</div>
					<?php ActiveForm::end(); ?>
				</div>
			</div>
		</div>
    </div>
</div>
