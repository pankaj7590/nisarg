<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form">
    <?php $form = ActiveForm::begin(); ?>
		<div class='row'>
			<div class='col-md-3'>
				<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
			</div>
			<div class='col-md-3'>
				<?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>
			</div>
			<div class='col-md-3'>
				<?= $form->field($model, 'default_value')->textarea(['rows' => 1]) ?>
			</div>
			<div class='col-md-3'>
				 <?= $form->field($model, 'value')->textarea(['rows' => 1]) ?>
			</div>
			<div class='col-md-12'>
				<div class="form-group">
					<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
				</div>
			</div>
		</div>
    <?php ActiveForm::end(); ?>
</div>