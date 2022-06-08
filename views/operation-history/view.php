<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OperationHistory */

$this->title = 'Операция № ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'История операций', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="operation-history-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы увеерны, что хотите удалить этот элемент ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'type_id',
                'value' => $model->operationTypeName
            ],
            [
                'attribute' => 'nomenclature_id',
                'value' => $model->nomenclatureName
            ],
            'count_in_operation',
            [
                'attribute' => 'employee_id',
                'value' => $model->employee->lname . ' ' . $model->employee->fname
            ],
            'last_operation',
            [
                'attribute' => 'created_at',
                'value' => $model->createdDate
            ],
            [
                'attribute' => 'updated_at',
                'value' => $model->updatedDate
            ],
        ],
    ]) ?>

</div>
