<?php

use app\models\NomenclatureList;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\NomenclatureList */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Nomenclature Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nomenclature-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'name',
            'reg_number',
            [
                'attribute' => 'category_id',
                'value'     =>  $model->category->name
            ],
//            'subcategory_id',
            'count_in_store',
            [
                'attribute' => 'unit_id',
                'value'     =>  $model->unit->unit
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
        ],
    ]) ?>

</div>
