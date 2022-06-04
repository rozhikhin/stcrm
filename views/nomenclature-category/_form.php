<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NomenclatureCategory */
/* @var $form yii\widgets\ActiveForm */
/* @var $allowedCategories Array */
?>

<div class="nomenclature-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php

    echo $form->field($model, 'parent_id')->dropDownList($allowedCategories,           ['options' =>
        [
            $model->parent_id ? $model->parent_id : 1=> ['selected' => true] //Create - Главная катетория по-умолчанию, Update - текущий родитель
        ]
    ]);
    ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
