<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OperationHistory */

$this->title = 'Изменить операцию ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'История операций', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="operation-history-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
