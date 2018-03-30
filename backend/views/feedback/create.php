<?php

use yii\helpers\Html;
use common\models\Feedback;


/* @var $this yii\web\View */
/* @var $model common\models\Feedback */

$type = Feedback::$types[$model->feedback_type];

switch($model->feedback_type){
	case Feedback::TYPE_FEEDBACK:
		$types = 'Feedbacks';
		$url = ['feedback'];
		break;
	case Feedback::TYPE_CONTACT:
		$types = 'Contacts';
		$url = ['contact-index'];
		break;
}

$this->title = 'Add '.$type;
$this->params['breadcrumbs'][] = ['label' => $types, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
            'roomTypes' => $roomTypes,
            'facilityTypes' => $facilityTypes,
    ]) ?>

</div>
