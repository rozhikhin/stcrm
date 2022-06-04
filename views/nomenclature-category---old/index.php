<?php

use app\models\NomenclatureCategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NomenclatureCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории номенклатуры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nomenclature-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'parentName',
                'value'     => function ($model, $key, $index, $column) {
//                    return $model->parent ? $model->parent->name : null;
                    return $model->parentName ? $model->parentName: null;
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, NomenclatureCategory $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
