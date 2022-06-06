<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NomenclatureList */

$this->title = 'Новая номенклатура';
$this->params['breadcrumbs'][] = ['label' => 'Список номенклатуры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nomenclature-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
