<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Feedback;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

switch($searchModel->feedback_type){
	case Feedback::TYPE_FEEDBACK:
		$this->title = 'Feedbacks';
		break;
	case Feedback::TYPE_CONTACT:
		$this->title = 'Contacts';
		break;
}
$this->params['breadcrumbs'][] = $this->title;

$type = Feedback::$types[$searchModel->feedback_type];
?>
<div class="feedback-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add '.$type, ['create', 'type' => $searchModel->feedback_type], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'surname',
            'email:email',
            'message:ntext',
            'created_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
