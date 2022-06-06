<?php

use app\models\NomenclatureList;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NomenclatureListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список номенклатуры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nomenclature-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новая номенклатура', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'name',
            'reg_number',
            [
                'attribute' => 'category_id',
                'value' => 'category.name'
            ],
//            'subcategory_id',
            'count_in_store',
            [
                'attribute' => 'unit_id',
                'value' => 'unit.unit'
            ],
            [
                'attribute' => 'last_operation_id',
                'value' => function (NomenclatureList $data) {
                                if ($data->lastOperation) {
                                    return Html::a(Html::encode($data->lastOperation->operationType->name), Url::to(['//operation-history/view', 'id' => $data->lastOperation->id]));
                                } else {
                                    return null;
                                }
                },
                'format' => 'raw',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, NomenclatureList $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
