<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Feedback;

/* @var $this yii\web\View */
/* @var $model common\models\Feedback */

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
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => $types, 'url' => $url];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'surname',
            'email:email',
            [
				'attribute' => 'feedback_type',
				'value' => function($data){
					return ($data->feedback_type?Feedback::$types[$data->feedback_type]:NULL);
				},
			],
            'room_type',
            'facility_type',
            'message:ntext',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
