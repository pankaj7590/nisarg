<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\OrderComponent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-component-form">
    <?php $form = ActiveForm::begin(); ?>
		<div class="row">
			<div class="col-md-4">
				<?= $form->field($model, 'room_id')->widget(Select2::classname(), [
					'data' => $rooms,
					'options' => ['placeholder' => 'Select room if any ...'],
					'pluginOptions' => [
						'allowClear' => true
					],
				]);?>
			</div>
			<div class="col-md-4">
				<?= $form->field($model, 'facility_id')->widget(Select2::classname(), [
					'data' => $facilities,
					'options' => ['placeholder' => 'Select facility if any ...'],
					'pluginOptions' => [
						'allowClear' => true
					],
				]);?>
			</div>
			<div class="col-md-4">
				<?= $form->field($model, 'charges')->textInput() ?>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
				</div>
			</div>
		</div>
    <?php ActiveForm::end(); ?>
</div>
