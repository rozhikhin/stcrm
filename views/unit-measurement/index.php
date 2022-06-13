<?php

use app\models\UnitMeasurement;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UnitMeasurementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Единицы измерения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-measurement-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новая единица измерения', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'unit',
            'description',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, UnitMeasurement $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
