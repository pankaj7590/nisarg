<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\Room */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="room-form">
    <?php $form = ActiveForm::begin(); ?>
		<div class='row'>
			<div class='col-md-12'>
				<?= $form->field($model, 'type')->dropdownList($roomTypes, ['prompt' => 'Select room type...']) ?>
			</div>
			<div class='col-md-12'>
				<?php if($model->coverImage){?>
					<div class="controls">
						<img src="<?= \common\components\MediaHelper::getImageUrl($model->coverImage->file_name)?>" width="200px"/>
					</div>
				<?php }?>
				<?= $form->field($model, 'coverImageFile')->fileInput() ?>
			</div>
			<div class='col-md-3'>
				<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
				<?= $form->field($model, 'charges')->textInput() ?>
				<?= $form->field($model, 'occupancy')->textInput() ?>
				<?= $form->field($model, 'beds')->textInput() ?>
			</div>
			<div class='col-md-9'>
				<?= $form->field($model, 'description')->textarea(['rows' => 11]) ?>
			</div>
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
	$url = ['room/create'];
}else{
	$url = ['room/update', 'id' => $model->id];
}
$this->registerJs("
	$('#room-type').on('change', function(){
		var type = $(this).val();
		window.location = '".Yii::$app->urlManager->createAbsoluteUrl($url)."&type='+type;
	});
", View::POS_READY, "set-room-type");
?>