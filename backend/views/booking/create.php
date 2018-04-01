<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Booking */

$this->title = 'Add Booking';
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
            'customers' => $customers,
            'facilityTypes' => $facilityTypes,
            'roomTypes' => $roomTypes,
    ]) ?>

</div>
