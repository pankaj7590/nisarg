<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Gallery;

/* @var $this yii\web\View */
/* @var $model common\models\Gallery */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Galleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-view">

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
            'description:ntext',
			[
				'attribute' => 'type',
				'value' => function($data){
					return ($data->type?Gallery::$types[$data->type]:NULL);
				},
			],
            [
				'attribute' => 'room_id',
				'visible' => ($data->room?true:false),
				'value' => function($data){
					return ($data->room?$data->room->name:NULL);
				},
			],
            [
				'attribute' => 'facility_id',
				'visible' => ($data->facility?true:false),
				'value' => function($data){
					return ($data->facility?$data->facility->name:NULL);
				},
			],
            [
				'attribute' => 'room_type_id',
				'visible' => ($data->roomType?true:false),
				'value' => function($data){
					return ($data->roomType?$data->roomType->name:NULL);
				},
			],
            [
				'attribute' => 'facility_type_id',
				'visible' => ($data->facilityType?true:false),
				'value' => function($data){
					return ($data->facilityType?$data->facilityType->name:NULL);
				},
			],
			[
				'attribute' => 'status',
				'value' => function($data){
					return ($data->status?Gallery::$statuses[$data->status]:NULL);
				},
			],
            [
				'attribute' => 'created_by',
				'value' => function($data){
					return ($data->createdBy?$data->createdBy->name:NULL);
				},
			],
            [
				'attribute' => 'updated_by',
				'value' => function($data){
					return ($data->updatedBy?$data->updatedBy->name:NULL);
				},
			],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
<?= $this->render('_gallerymedia', [
	'searchModel' => $searchModel,
	'dataProvider' => $dataProvider,
]);?>
