<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MembershipCustomer */

$this->title = 'Add Customer Membership';
$this->params['breadcrumbs'][] = ['label' => 'Memberships', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="membership-customer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
            'memberships' => $memberships,
            'customers' => $customers,
    ]) ?>

</div>
