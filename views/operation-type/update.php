<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OperationType */

$this->title = 'Изменить тип операции: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Типы оперций', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="operation-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
