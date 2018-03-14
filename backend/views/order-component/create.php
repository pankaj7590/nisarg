<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\OrderComponent */

$this->title = 'Create Order Component';
$this->params['breadcrumbs'][] = ['label' => 'Order Components', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-component-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
