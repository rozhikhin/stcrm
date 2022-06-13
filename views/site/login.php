<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login w-50 d-flex flex-column align-items-center">
    <h1 class="mt-5 mb-5"><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'options' => [
            'class' => 'form-horizontal w-100 ',
        ],
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'offset-lg-1 col-lg-3 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-4 form-control'],
            'errorOptions' => ['class' => 'col-lg-3 invalid-feedback'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Пользователь') ?>

        <?= $form->field($model, 'password')->passwordInput()->label('Пароль')  ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"offset-lg-5 custom-control custom-checkbox \">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ])->label('Запомнить меня')  ?>

        <div class="form-group">
            <div class="w-100">
                <?= Html::submitButton('Вход', ['class' => 'btn btn-primary pl-5 pr-5 mt-3 mr-auto ml-auto d-block', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
