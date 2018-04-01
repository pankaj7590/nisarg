<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use common\models\Order;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">
    <?php $form = ActiveForm::begin(); ?>
		<div class="row">
			<div class="col-md-4">
				<?= $form->field($model, 'discount')->textInput() ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<?= $form->field($model, 'status')->dropdownList(Order::$statuses, ['prompt' => 'Select status...']) ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
				</div>
			</div>
		</div>
    <?php ActiveForm::end(); ?>
</div>