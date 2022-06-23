<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Invoice */

$this->title = 'Новая накладная';
$this->params['breadcrumbs'][] = ['label' => 'Накладные', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
