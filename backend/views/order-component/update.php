<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OrderComponent */

$this->title = 'Update Order Detail';
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['order/index']];
$this->params['breadcrumbs'][] = ['label' => $model->order_id, 'url' => ['order/view', 'id' => $model->order_id]];
$this->params['breadcrumbs'][] = ['label' => 'Order Details', 'url' => ['index', 'id' => $model->order_id]];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-component-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
            'rooms' => $rooms,
            'facilities' => $facilities,
    ]) ?>

</div>
