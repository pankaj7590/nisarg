<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Membership;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MembershipCustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Membership Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="membership-customer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Customer Membership', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

			[
				'attribute' => 'membership_id',
				'value' => function($data){
					return ($data->membership?$data->membership->name:null);
				},
			],
			[
				'attribute' => 'customer_id',
				'value' => function($data){
					return ($data->customer?$data->customer->name:null);
				},
			],
			[
				'attribute' => 'type',
				'value' => function($data){
					return ($data->type?Membership::$types[$data->type]:null);
				},
			],
            'from_date:datetime',
            'to_date:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
