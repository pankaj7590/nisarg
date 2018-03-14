<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'navbar-form navbar-left']]); ?>
	<?= $form->field($model, 'email_mobile', ['template' => '{input}'])->textInput(['autofocus' => true, 'placeholder' => 'Email/Mobile'])->label(false) ?>
	<?= $form->field($model, 'password', ['template' => '{input}'])->passwordInput(['autofocus' => true, 'placeholder' => 'Password'])->label(false) ?>
	<?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
<?php ActiveForm::end(); ?>