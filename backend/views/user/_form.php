<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
    <?php $form = ActiveForm::begin(); ?>
		<div class='row'>
			<div class='col-md-3'>
				<?php if($model->profilePicture){?>
					<div class="controls">
						<img src="<?= \common\components\MediaHelper::getImageUrl($model->profilePicture->file_name)?>"/>
					</div>
				<?php }?>
				<?= $form->field($model, 'profilePictureFile')->fileInput() ?>
			</div>
			<div class='col-md-9'>
				<div class='row'>
					<div class='col-md-12'>
						<?= $form->field($model, 'name')->textInput() ?>
					</div>
					<div class='col-md-6'>
							<?= $form->field($model, 'username')->textInput() ?>
							<?= $form->field($model, 'password')->passwordInput() ?>
					</div>
					<div class='col-md-6'>
							<?= $form->field($model, 'email')->textInput() ?>
							<?= $form->field($model, 'phone')->textInput() ?>
					</div>
				</div>
			</div>
			<div class='col-md-8'>
				<div class="form-group">
					<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
				</div>
			</div>
		</div>
    <?php ActiveForm::end(); ?>
</div>