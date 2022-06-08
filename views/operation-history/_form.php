<?php

use app\models\Employee;
use app\models\NomenclatureList;
use app\models\OperationType;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OperationHistory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operation-history-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $types = OperationType::find()->all();
        $items = ArrayHelper::map($types,'id','name');
        echo $form->field($model, 'type_id')->dropDownList($items);
    ?>

    <?php
        $nomeclature = NomenclatureList::find()->all();
        $items = ArrayHelper::map($nomeclature,'id','name');
        echo $form->field($model, 'nomenclature_id')->dropDownList($items);
    ?>

    <?= $form->field($model, 'count_in_operation')->textInput() ?>

    <?php
        $employees = Employee::find()->all();
        $items = ArrayHelper::map($employees,'id','fullName');
        echo $form->field($model, 'employee_id')->dropDownList($items);
    ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
