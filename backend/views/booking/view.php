<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Booking;

/* @var $this yii\web\View */
/* @var $model common\models\Booking */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-view">

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
            'phone',
            'email:email',
            'checkin_date:date',
            'checkout_date:date',
			[
				'attribute' => 'booking_type',
				'value' => function($data){
					return ($data->booking_type?Booking::$booking_types[$data->booking_type]:null);
				},
			],
			[
				'attribute' => 'room_type',
				'value' => function($data){
					return ($data->roomType?$data->roomType->name:null);
				},
			],
			[
				'attribute' => 'facility_type',
				'value' => function($data){
					return ($data->facilityType?$data->facilityType->name:null);
				},
			],
            'adults',
            'children',
            'rooms',
            'message:ntext',
			[
				'attribute' => 'status',
				'value' => function($data){
					return ($data->status?Booking::$statuses[$data->status]:null);
				},
			],
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
