<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FacilitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Facilities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facility-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Facility', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

			[
				'attribute' => 'icon_image',
				'filter' => false,
				'value' => function($data){
					$fileName = ($data->iconImage?$data->iconImage->file_name:"");
					return \common\components\MediaHelper::getImageUrl($fileName);
				},
				'format' => ['image', ['width' => '100']],
			],
			[
				'attribute' => 'cover_image',
				'filter' => false,
				'value' => function($data){
					$fileName = ($data->coverImage?$data->coverImage->file_name:"");
					return \common\components\MediaHelper::getImageUrl($fileName);
				},
				'format' => ['image', ['width' => '100']],
			],
			[
				'attribute' => 'type',
				'value' => function($data){
					return ($data->facilityType?$data->facilityType->name:null);
				},
			],
            'name',
            //'charges',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
