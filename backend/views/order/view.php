<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Order;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = $model->customer->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Details', ['order-component/index', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
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
				'attribute' => 'customer_id',
				'value' => function($data){
					return ($data->customer?$data->customer->name:null);
				},
			],
			[
				'attribute' => 'status',
				'value' => function($data){
					return ($data->status?Order::$statuses[$data->status]:null);
				},
			],
			'total',
            'discount',
			'nettotal',
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
