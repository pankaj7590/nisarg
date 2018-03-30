<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\NewsEvent;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsEventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = NewsEvent::$types[$searchModel->type];
switch($searchModel->type){
	case NewsEvent::TYPE_EVENT:
		$type = 'Event';
		$url = ['create', 'type' => $searchModel->type];
		break;
	default:
		$type = 'News';
		$url = ['create'];
		break;
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add '.$type, $url, ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

			[
				'attribute' => 'photo',
				'filter' => false,
				'value' => function($data){
					$fileName = ($data->photoPicture?$data->photoPicture->file_name:"");
					return \common\components\MediaHelper::getImageUrl($fileName);
				},
				'format' => ['image', ['width' => '100']],
			],
            'title',
            'news_event_date',
            'place:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
