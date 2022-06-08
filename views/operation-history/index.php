<?php

use app\models\OperationHistory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OperationHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'История операций';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operation-history-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новая операция', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'type_id',
                'value' => 'operationTypeName'
            ],
            [
                'attribute' => 'nomenclature_id',
                'value' => 'nomenclatureName'
            ],
            'count_in_operation',
            [
                'attribute' => 'employee_id',
                'value' => 'employeeFullName'
            ],
            'last_operation',
            [
                'attribute' => 'created_at',
                'value' => 'createdDate'
            ],
            [
                'attribute' => 'updated_at',
                'value' => 'updatedDate'
            ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, OperationHistory $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
