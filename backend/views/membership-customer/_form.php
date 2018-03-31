<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\MembershipCustomer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="membership-customer-form">
    <?php $form = ActiveForm::begin(); ?>
		<div class='row'>
			<div class='col-md-6'>
				<?= $form->field($model, 'membership_id')->dropdownList($memberships, ['prompt' => 'Select membership']) ?>
				<?= $form->field($model, 'from_date')->textInput()->widget(DateTimePicker::classname(), [
					'options' => ['placeholder' => 'Enter from date...'],
					'pluginOptions' => [
						'autoclose' => true,
						'minView' => 4,
						'format' => Yii::$app->params['jsDateFormat'],
					]
				]); ?>
				<?= $form->field($model, 'discount')->textInput() ?>
			</div>
			<div class='col-md-6'>
				<?= $form->field($model, 'customer_id')->dropdownList($customers, ['prompt' => 'Select customer']) ?>
				<?= $form->field($model, 'to_date')->textInput()->widget(DateTimePicker::classname(), [
					'options' => ['placeholder' => 'Enter to date...'],
					'pluginOptions' => [
						'autoclose' => true,
						'minView' => 4,
						'format' => Yii::$app->params['jsDateFormat'],
					]
				]); ?>
				<?= $form->field($model, 'charges')->textInput() ?>
			</div>
			<div class='col-md-12'>
				<div class="form-group">
					<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
				</div>
			</div>
		</div>
    <?php ActiveForm::end(); ?>
</div>