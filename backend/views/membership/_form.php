<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Membership;

/* @var $this yii\web\View */
/* @var $model common\models\Membership */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="membership-form">
    <?php $form = ActiveForm::begin(); ?>
		<div class='row'>
			<div class='col-md-3'>
				<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
				<?= $form->field($model, 'type')->dropdownList(Membership::$types,['prompt' => 'Select type']) ?>
				<?= $form->field($model, 'discount')->textInput() ?>
			</div>
			<div class='col-md-9'>
				<?= $form->field($model, 'information')->textarea(['rows' => 8]) ?>
			</div>
			<div class='col-md-12'>
				<div class="form-group">
					<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
				</div>
			</div>
		</div>
    <?php ActiveForm::end(); ?>
</div>