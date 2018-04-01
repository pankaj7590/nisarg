<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Booking;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bookings';
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
				<?= GridView::widget([
					'dataProvider' => $dataProvider,
					'columns' => [
						['class' => 'yii\grid\SerialColumn'],

						'checkin_date',
						'checkout_date',
						[
							'attribute' => 'status',
							'value' => function($data){
								return ($data->status?Booking::$statuses[$data->status]:null);
							},
						],
						'created_at:datetime',

						[
							'class' => 'yii\grid\ActionColumn',
							'template' => '{view} {cancel}',
							'buttons' => [
								'view' => function($url, $model, $key){
									return Html::a('<span class="fa fa-eye"></span>', ['view', 'id' => $model->id], ['title' => 'View Booking', 'data-pjax' => 0]);
								},
								'cancel' => function($url, $model, $key){
									if($model->status == Booking::STATUS_REQUESTED){
										return Html::a('<span class="fa fa-remove"></span>', ['cancel', 'id' => $model->id], ['title' => 'Cancel Booking', 'data-pjax' => 0, 'data-method' => 'post', 'data-confirm' => 'Are you sure you want to cancel the request?']);
									}
								},
							],
						],
					],
				]); ?>
			</div>
		</div>
	</div>
</div>