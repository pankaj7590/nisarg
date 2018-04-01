<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\datetime\DateTimePicker;
use common\models\Booking;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-form">
    <?php $form = ActiveForm::begin(); ?>
		<div class='row'>
			<div class='col-md-6'>
				<?= $form->field($model, 'customer_id')->widget(Select2::classname(), [
					'data' => $customers,
					'options' => ['placeholder' => 'Select customer or enter below details ...'],
					'pluginOptions' => [
						'allowClear' => true
					],
				]);?>
			</div>
		</div>
		<div class='row'>
			<div class='col-md-6'>
				<div class='row'>
					<div class='col-md-4'>
						<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
					</div>
					<div class='col-md-4'>
						<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
					</div>
					<div class='col-md-4'>
						<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
					</div>
				</div>
				<div class='row'>
					<div class='col-md-6'>
						<?= $form->field($model, 'checkin_date')->textInput()->widget(DateTimePicker::classname(), [
							'options' => ['placeholder' => 'Enter check in date...'],
							'pluginOptions' => [
								'autoclose' => true,
								'minView' => 4,
								'format' => Yii::$app->params['jsDateFormat'],
							]
						]); ?>
					</div>
					<div class='col-md-6'>
						<?= $form->field($model, 'checkout_date')->textInput()->widget(DateTimePicker::classname(), [
							'options' => ['placeholder' => 'Enter check out date...'],
							'pluginOptions' => [
								'autoclose' => true,
								'minView' => 4,
								'format' => Yii::$app->params['jsDateFormat'],
							]
						]); ?>
					</div>
				</div>
				<div class='row'>
					<div class='col-md-6'>
						<?= $form->field($model, 'room_type')->dropdownList($roomTypes, ['prompt' => 'Select room type...']) ?>
					</div>
					<div class='col-md-6'>
						<?= $form->field($model, 'facility_type')->dropdownList($facilityTypes, ['prompt' => 'Select facility type...']) ?>
					</div>
				</div>
				<div class='row'>
					<div class='col-md-4'>
						<?= $form->field($model, 'adults')->textInput() ?>
					</div>
					<div class='col-md-4'>
						<?= $form->field($model, 'children')->textInput() ?>
					</div>
					<div class='col-md-4'>
						<?= $form->field($model, 'rooms')->textInput() ?>
					</div>
				</div>
			</div>
			<div class='col-md-6'>
				<div class='row'>
					<div class='col-md-12'>
						<?= $form->field($model, 'message')->textarea(['rows' => 11]) ?>
					</div>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-md-4'>
				<?= $form->field($model, 'status')->dropdownList(Booking::$statuses, ['prompt' => 'Select status...']) ?>
			</div>
		</div>
		<div class='row'>
			<div class='col-md-12'>
				<div class="form-group">
					<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
				</div>
			</div>
		</div>
    <?php ActiveForm::end(); ?>
</div>

<?php
if($model->isNewRecord){
	$url = ['booking/create'];
}else{
	$url = ['booking/update', 'id' => $model->id];
}
$this->registerJs("
	$('#booking-customer_id').on('change', function(){
		var customer = $(this).val();
		window.location = '".Yii::$app->urlManager->createAbsoluteUrl($url)."&customer='+customer;
	});
", View::POS_READY, "set-customer");
?>