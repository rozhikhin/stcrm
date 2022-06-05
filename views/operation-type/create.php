<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OperationType */

$this->title = 'Новый тип операции';
$this->params['breadcrumbs'][] = ['label' => 'Типы операций', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operation-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
