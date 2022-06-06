<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NomenclatureList */

$this->title = 'Изменить номенклатуру: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Список номенклатуры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="nomenclature-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
