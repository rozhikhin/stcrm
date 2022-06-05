<?php

use app\models\OperationHistory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OperationHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Operation Histories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operation-history-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Operation History', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date',
            'type',
            'nomenclature',
            'count_in_operation',
            //'employee',
            //'last_operation',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, OperationHistory $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
