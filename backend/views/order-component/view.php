<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\OrderComponent */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['order/index']];
$this->params['breadcrumbs'][] = ['label' => $model->order_id, 'url' => ['order/view', 'id' => $model->order_id]];
$this->params['breadcrumbs'][] = ['label' => 'Order Details', 'url' => ['index', 'id' => $model->order_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-component-view">

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
			[
				'attribute' => 'room_id',
				'value' => function($data){
					return ($data->room?$data->room->name:null);
				},
			],
			[
				'attribute' => 'facility_id',
				'value' => function($data){
					return ($data->facility?$data->facility->name:null);
				},
			],
            'charges',
            'status',
			[
				'attribute' => 'created_by',
				'value' => function($data){
					return ($data->createdBy?$data->createdBy->name:null);
				},
			],
			[
				'attribute' => 'updated_by',
				'value' => function($data){
					return ($data->updatedBy?$data->updatedBy->name:null);
				},
			],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
