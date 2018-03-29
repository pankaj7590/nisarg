<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FacilityType */

$this->title = 'Update Facility Type: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Facility Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="facility-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>