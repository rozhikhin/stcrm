<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UnitMeasurement */

$this->title = 'Изменить единицу измерения: ' . $model->unit;
$this->params['breadcrumbs'][] = ['label' => 'Unit Measurements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unit-measurement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
