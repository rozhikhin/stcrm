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
            <div class="col-lg-4 mt-5 d-flex flex-column align-items-center">
                <h2>Отделы</h2>
                <p><a class="btn btn-outline-secondary" href="<?=Url::to(['department/index']); ?>">Перейти &raquo;</a></p>
            </div>
            <div class="col-lg-4 mt-5 d-flex flex-column align-items-center">
                <h2>Сотрудники</h2>
                <p><a class="btn btn-outline-secondary" href="<?=Url::to(['employee/index']); ?>">Перейти &raquo;</a></p>
            </div>
            <div class="col-lg-4 mt-5 d-flex flex-column align-items-center">
                <h2>Категории</h2>
                <p><a class="btn btn-outline-secondary" href="<?=Url::to(['nomenclature-category/index']); ?>">Перейти &raquo;</a></p>
            </div>
            <div class="col-lg-4 mt-5 d-flex flex-column align-items-center">
                <h2>Единицы измерения</h2>
                <p><a class="btn btn-outline-secondary" href="<?=Url::to(['unit-measurement/index']); ?>">Перейти &raquo;</a></p>
            </div>
            <div class="col-lg-4 mt-5 d-flex flex-column align-items-center">
                <h2>Номенклатура</h2>
                <p><a class="btn btn-outline-secondary" href="<?=Url::to(['nomenclature-list/index']); ?>">Перейти &raquo;</a></p>
            </div>
            <div class="col-lg-4 mt-5 d-flex flex-column align-items-center">
                <h2>Типы операций</h2>
                <p><a class="btn btn-outline-secondary" href="<?=Url::to(['operation-type/index']); ?>">Перейти &raquo;</a></p>
            </div>
            <div class="col-lg-4 mt-5 d-flex flex-column align-items-center">
                <h2>Операции</h2>
                <p><a class="btn btn-outline-secondary" href="<?=Url::to(['operation-history/index']); ?>">Перейти &raquo;</a></p>
            </div>

        </div>

    </div>
</div>
