<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Membership;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MembershipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Memberships';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="membership-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Membership', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
			[
				'attribute' => 'type',
				'value' => function($data){
					return ($data->type?Membership::$types[$data->type]:null);
				},
			],
            'discount',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
