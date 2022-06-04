<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
Yii::$app->layout = 'start';
?>
<div class="site-error mt-5">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger mt-3">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
         Произошла ошибка при обработке веб-сервером вашего запроса.
    </p>
    <p>
    <p><a class="btn btn-outline-secondary" href="<?=Url::to(['site/index']); ?>">Вернуться на главную &raquo;</a></p>
    </p>

</div>
