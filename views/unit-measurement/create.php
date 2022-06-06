<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UnitMeasurement */

$this->title = 'Новая единица измерения';
$this->params['breadcrumbs'][] = ['label' => 'Единицы измерения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-measurement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
