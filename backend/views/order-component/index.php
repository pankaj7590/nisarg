<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderComponentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Details';
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['order/index']];
$this->params['breadcrumbs'][] = ['label' => $searchModel->order_id, 'url' => ['order/view', 'id' => $searchModel->order_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-component-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add New', ['create', 'id' => $searchModel->order_id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
