<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NomenclatureCategory */
/* @var $allowedCategories Array */

$this->title = 'Create Nomenclature Category';
$this->params['breadcrumbs'][] = ['label' => 'Nomenclature Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nomenclature-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'allowedCategories' => $allowedCategories
    ]) ?>

</div>
