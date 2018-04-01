<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Order;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

			[
				'attribute' => 'customer_id',
				'value' => function($data){
					return ($data->customer?$data->customer->name:null);
				},
			],
			'total',
            'discount',
			'nettotal',
			[
				'attribute' => 'status',
				'value' => function($data){
					return ($data->status?Order::$statuses[$data->status]:null);
				},
			],
			[
				'attribute' => 'updated_by',
				'value' => function($data){
					return ($data->updatedBy?$data->updatedBy->name:null);
				},
			],
            'updated_at:datetime',

            [
				'class' => 'yii\grid\ActionColumn',
				'template' => '{view} {update} {delete} {details}',
				'buttons' => [
					'details' => function($url, $model, $key){
						return Html::a('<span class="glyphicon glyphicon-list"></span>', ['order-component/index', 'id' => $model->id], ['title' => 'View Details', 'data-pjax' => 0]);
					}
				],
			],
        ],
    ]); ?>
</div>
