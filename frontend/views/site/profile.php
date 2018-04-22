<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\Setting;
use common\components\Relations;


/* @var $this yii\web\View */
/* @var $model common\models\Admission */

$this->title = 'My Profile';
$this->params['breadcrumbs'][] = $this->title;
$user = Yii::$app->user;
$urlManager = Yii::$app->urlManager;
$baseUrl = $urlManager->baseUrl;

$this->params['subheader'] = '<div id="Subheader" style="padding:190px 0 100px;">
                <div class="container">
                    <div class="column one">
                        <h1 class="title">'.$this->title.'</h1>
                    </div>
                </div>
            </div>';
?>
<div class="section mcb-section " style="padding-top:70px; padding-bottom:30px; background-image:url(<?= $baseUrl;?>/images/home_hotel2_pattern.png); background-repeat:repeat; background-position:center; ">
	<div class="section_wrapper mcb-section-inner">
		<div class="wrap mcb-wrap one clearfix">
			<!-- One Third (1/3) Column -->
			<div class="column mcb-column one-third column_placeholder">
				<div class="placeholder">
					<?php $form = ActiveForm::begin(['id' => 'form']); ?>
						<img src="<?= \common\components\MediaHelper::getImageUrl(($model->profilePicture?$model->profilePicture->file_name:""))?>" alt="" class="img-border img-indent" style="width:100px;">
						<?= $form->field($model, 'profilePictureFile')->fileInput() ?>
						<?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => '']) ?>
						<input name="Guardian[username]" style="display:none">
						<?= $form->field($model, 'username')->textInput(['maxlength' => true, 'class' => '']) ?>
						<input name="Guardian[password]" type="password" style="display:none">
						<?= $form->field($model, 'password')->passwordInput(['class' => '']) ?>
						<?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => '']) ?>
						<?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'class' => '']) ?>
						<div class="form-group">
							<?= Html::resetButton('Reset', ['class' => 'comment-submit', 'name' => 'contact-button']) ?>
							<?= Html::submitButton('Save', ['class' => 'comment-submit', 'name' => 'contact-button']) ?>
						</div>
					<?php ActiveForm::end(); ?>
				</div>
			</div>
		</div>
	</div>
</div>