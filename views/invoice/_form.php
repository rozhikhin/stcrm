<?php

use app\models\Organization;
use app\models\Supplier;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Invoice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invoice-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->widget(
            DatePicker::class, [
                'pluginOptions' => [
                    'format' => 'dd-mm-yyyy',
                    'todayHighlight' => true,
                    'autoclose'=>true,
                ]
            ]
    ) ?>

    <?php
        $types = Organization::find()->all();
        $items = ArrayHelper::map($types,'id','name');
        echo $form->field($model, 'organisation_id')->dropDownList($items);
    ?>

    <?php
        $types = Supplier::find()->all();
        $items = ArrayHelper::map($types,'id','name');
        echo $form->field($model, 'supplier_id')->dropDownList($items);
    ?>

    <?= $form->field($model, 'summ')->textInput() ?>

    <?php
        $items = [0 => 'Нет', 1 => 'Да'];
        echo $form->field($model, 'payment')->dropDownList($items);
    ?>

    <?php if (Yii::$app->controller->action->id != 'update'): ?>
        <?= $form->field($model, 'imageFile')->fileInput()->label('Выберите файл : ') ?>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>