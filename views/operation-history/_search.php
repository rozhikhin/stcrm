<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OperationHistorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operation-history-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'type_id') ?>

    <?= $form->field($model, 'nomenclature') ?>

    <?= $form->field($model, 'count_in_operation') ?>

    <?php // echo $form->field($model, 'employee') ?>

    <?php // echo $form->field($model, 'last_operation') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
