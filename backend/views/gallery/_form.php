<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Gallery;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-form">
    <?php $form = ActiveForm::begin(); ?>
		<div class="row">
			<div class="col-md-3">
				<?= $form->field($model, 'type')->dropdownList(Gallery::$types, ['prompt' => 'Select gallery type...']) ?>
				<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
				<?php if($model->type == Gallery::TYPE_ROOM){?>
					<?= $form->field($model, 'room_id')->dropdownList($rooms, ['prompt' => 'Select room...']) ?>
				<?php }elseif($model->type == Gallery::TYPE_FACILITY){?>
					<?= $form->field($model, 'facility_id')->dropdownList($facilities, ['prompt' => 'Select facility...']) ?>
				<?php }elseif($model->type == Gallery::TYPE_ROOM_TYPE){?>
					<?= $form->field($model, 'room_type_id')->dropdownList($roomTypes, ['prompt' => 'Select room type...']) ?>
				<?php }elseif($model->type == Gallery::TYPE_FACILITY_TYPE){?>
					<?= $form->field($model, 'facility_type_id')->dropdownList($facilityTypes, ['prompt' => 'Select facility type...']) ?>
				<?php }?>
				<?= $form->field($model, 'status')->dropdownList(Gallery::$statuses, ['prompt' => 'Select status...']) ?>
			</div>
			<div class="col-md-9">
				<?= $form->field($model, 'description')->textarea(['rows' => 11]) ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?= $form->field($model, 'galleryPictures[]')->fileInput(['multiple' => true]) ?>
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

<?php
if($model->isNewRecord){
	$url = ['gallery/create'];
}else{
	$url = ['gallery/update', 'id' => $model->id];
}
$this->registerJs("
	$('#gallery-type').on('change', function(){
		var type = $(this).val();
		window.location = '".Yii::$app->urlManager->createAbsoluteUrl($url)."&type='+type;
	});
", View::POS_READY, "set-type");
?>