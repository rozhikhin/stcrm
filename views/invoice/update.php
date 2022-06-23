<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Invoice */

$this->title = 'Изменить накладную: ' . $model->number;
$this->params['breadcrumbs'][] = ['label' => 'Накладные', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->number, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="invoice-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
