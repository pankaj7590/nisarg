<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Feedback */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feedback-form">
    <?php $form = ActiveForm::begin(); ?>
		<div class='row'>
			<div class='col-md-8'>
				<div class='row'>
					<div class='col-md-12'>
						<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
					</div>
					<div class='col-md-6'>
						<?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
						<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
					</div>
					<div class='col-md-6'>
						<?= $form->field($model, 'room_type')->dropdownList(ArrayHelper::map($roomTypes, 'id', 'name'), ['prompt' => 'Select room if any']) ?>
						<?= $form->field($model, 'facility_type')->dropdownList(ArrayHelper::map($roomTypes, 'id', 'name'), ['prompt' => 'Select facility if any']) ?>
					</div>
				</div>
			</div>
			<div class='col-md-4'>
				<?= $form->field($model, 'message')->textarea(['rows' => 8]) ?>
			</div>
			<div class='col-md-12'>
				<div class="form-group">
					<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
				</div>
			</div>
		</div>
    <?php ActiveForm::end(); ?>
</div>