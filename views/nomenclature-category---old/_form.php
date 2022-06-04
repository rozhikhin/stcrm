<?php

use app\models\NomenclatureCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NomenclatureCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nomenclature-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'parent')->textInput(['maxlength' => true]) ?>

    <?php
//   Выбираем для выпающего списка поля parent все категории, кроме текущей (при обновлении - нельзя добавить категрию как родителя самой себе)
//   И исключить из списка все дочерние категории (при обновлении -  две категории не могут быть родителями друг у друга)
    $categories = NomenclatureCategory::find()
        ->where(['is', 'parent', new \yii\db\Expression('null')])
        ->andWhere(['!=', 'id', $model->id])
        ->orWhere(['!=', 'parent', $model->id])
        ->andWhere(['!=', 'id', $model->id])
        ->orderBy(['id' => 'desc'])
        ->all();
//    $categories = NomenclatureCategory::find()->all();
    $items = ArrayHelper::map($categories,'id','name');
    $params = ['prompt' => 'Укажите, если необходимо'];

//    unset($items[$model->id]);
    echo $form->field($model, 'parent')->dropDownList($items, $params);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
