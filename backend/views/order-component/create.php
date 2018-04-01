<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\OrderComponent */

$this->title = 'Add New';
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['order/index']];
$this->params['breadcrumbs'][] = ['label' => $model->order_id, 'url' => ['order/view', 'id' => $model->order_id]];
$this->params['breadcrumbs'][] = ['label' => 'Order Details', 'url' => ['index', 'id' => $model->order_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-component-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
            'rooms' => $rooms,
            'facilities' => $facilities,
    ]) ?>

</div>
