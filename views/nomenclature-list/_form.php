<?php

use app\models\NomenclatureCategory;
use app\models\UnitMeasurement;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NomenclatureList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nomenclature-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reg_number')->textInput(['maxlength' => true]) ?>

    <?php
        $categories = NomenclatureCategory::find()->all();
        $items = ArrayHelper::map($categories,'id','name');
        echo $form->field($model, 'category_id')->dropDownList($items);
    ?>

<!--    --><?//= $form->field($model, 'subcategory_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'count_in_store')->textInput() ?>

    <?php
        $units= UnitMeasurement::find()->all();
        $items = ArrayHelper::map($units,'id','unit');
        echo $form->field($model, 'unit_id')->dropDownList($items);
    ?>

<!--    --><?//= $form->field($model, 'last_operation_id')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
