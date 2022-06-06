<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg navbar-dark fixed-top bg-dark',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav mr-auto pt-5 pl-2 sidenav '],
        'items' => [
            [
                'label' => 'Отделы',
                'url' => ['/department/index'],
//                'items' => [
//                    ['label' => 'Item1', 'url' => ['#']],
//                    ['label' => 'Item2', 'url' => ['#']] ,
//                ],
            ],
            [
                'label' => 'Сотрудники',
                'url' => ['/employee/index'],
            ],
            [
                'label' => 'Категории',
                'url' => ['/nomenclature-category/index'],
            ],
            [
                'label' => 'Единицы измерения',
                'url' => ['/unit-measurement/index'],
            ],
            [
                'label' => 'Номенклатура',
                'url' => ['/nomenclature-list/index'],
            ],
            [
                'label' => 'Типы оперций',
                'url' => ['/operation-type/index'],
            ],
            [
                'label' => 'Операции',
                'url' => ['/operation-history/index'],
            ],


            Yii::$app->user->isGuest ?
                ''
                :
                (
                '<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline mt-3 ml-0'])
                    . Html::submitButton(
                        'Выйти (' . Yii::$app->user->identity->fname . ')',
                        ['class' => 'btn btn-link logout p-1']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0 mh-100">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
