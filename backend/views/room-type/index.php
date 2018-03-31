<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RoomTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Room Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Room Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

			[
				'attribute' => 'coverImageFile',
				'filter' => false,
				'value' => function($data){
					$fileName = ($data->coverImage?$data->coverImage->file_name:"");
					return \common\components\MediaHelper::getImageUrl($fileName);
				},
				'format' => ['image', ['width' => '100']],
			],
            'name',
            'description:ntext',
            'charges',
            'occupancy',
            'beds',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
