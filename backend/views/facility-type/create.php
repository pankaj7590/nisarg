<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FacilityType */

$this->title = 'Add Facility Type';
$this->params['breadcrumbs'][] = ['label' => 'Facility Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facility-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
