<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Booking;

/* @var $this yii\web\View */
/* @var $model common\models\Booking */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['subheader'] = '<div id="Subheader" style="padding:190px 0 100px;">
                <div class="container">
                    <div class="column one">
                        <h1 class="title">My Bookings</h1>
                    </div>
                </div>
            </div>';
?>
<div class="section mcb-section " style="padding-top:70px; padding-bottom:20px;">
	<div class="section_wrapper mcb-section-inner">
		<div class="wrap mcb-wrap one clearfix">
            <div class="">
				<?php if($model->status == Booking::STATUS_REQUESTED){?>
					<p>
						<?= Html::a('Cancel', ['delete', 'id' => $model->id], [
							'class' => 'btn btn-danger',
							'data' => [
								'confirm' => 'Are you sure you want to delete this item?',
								'method' => 'post',
							],
						]) ?>
					</p>
				<?php }?>

				<?= DetailView::widget([
					'model' => $model,
					'attributes' => [
						'name',
						'surname',
						'phone',
						'email:email',
						'checkin_date:date',
						'checkout_date:date',
						[
							'attribute' => 'room_type',
							'visible' => ($data->roomType?true:false),
							'value' => function($data){
								return ($data->roomType?$data->roomType->name:null);
							},
						],
						[
							'attribute' => 'facility_type',
							'visible' => ($data->facilityType?true:false),
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
		</div>
	</div>
</div>