<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MembershipCustomer */

$this->title = 'Update Customer Membership : '.($model->customer->name.'-'.$model->membership->name);
$this->params['breadcrumbs'][] = ['label' => 'Membership Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => ($model->customer->name.'-'.$model->membership->name), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="membership-customer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
            'memberships' => $memberships,
            'customers' => $customers,
    ]) ?>

</div>
