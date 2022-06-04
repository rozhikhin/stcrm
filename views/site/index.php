<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Рабочий стол</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Отделы</h2>
                <p><a class="btn btn-outline-secondary" href="<?=Url::to(['department/index']); ?>">Перейти &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Сотрудники</h2>
                <p><a class="btn btn-outline-secondary" href="<?=Url::to(['employee/index']); ?>">Перейти &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Категории</h2>
                <p><a class="btn btn-outline-secondary" href="<?=Url::to(['nomenclature-category---old/index']); ?>">Перейти &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Инструменты</h2>
                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
