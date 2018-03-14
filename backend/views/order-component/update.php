<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OrderComponent */

$this->title = 'Update Order Component: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Order Components', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-component-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
