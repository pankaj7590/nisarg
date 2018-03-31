<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Membership;

/* @var $this yii\web\View */
/* @var $model common\models\MembershipCustomer */

$this->title = ($model->customer->name.'-'.$model->membership->name);
$this->params['breadcrumbs'][] = ['label' => 'Membership Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="membership-customer-view">

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
            'discount',
            'charges',
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
