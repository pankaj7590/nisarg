<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\Facility */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="facility-form">
    <?php $form = ActiveForm::begin(); ?>
		<div class='row'>
			<div class='col-md-12'>
				<?= $form->field($model, 'type')->dropdownList($facilityTypes, ['prompt' => 'Select facility type...']) ?>
			</div>
		</div>
		<div class='row'>
			<div class='col-md-3'>
				<?php if($model->iconImage){?>
					<div class="controls">
						<img src="<?= \common\components\MediaHelper::getImageUrl($model->iconImage->file_name)?>" width="200px"/>
					</div>
				<?php }?>
				<?= $form->field($model, 'iconImageFile')->fileInput() ?>
			</div>
			<div class='col-md-9'>
				<?php if($model->coverImage){?>
					<div class="controls">
						<img src="<?= \common\components\MediaHelper::getImageUrl($model->coverImage->file_name)?>" width="200px"/>
					</div>
				<?php }?>
				<?= $form->field($model, 'coverImageFile')->fileInput() ?>
			</div>
		</div>
		<div class='row'>
			<div class='col-md-3'>
				<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
				<?= $form->field($model, 'charges')->textInput() ?>
			</div>
			<div class='col-md-9'>
				<?= $form->field($model, 'description')->textarea(['rows' => 5]) ?>
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
	$url = ['facility/create'];
}else{
	$url = ['facility/update', 'id' => $model->id];
}
$this->registerJs("
	$('#facility-type').on('change', function(){
		var type = $(this).val();
		window.location = '".Yii::$app->urlManager->createAbsoluteUrl($url)."&type='+type;
	});
", View::POS_READY, "set-facility-type");
?>