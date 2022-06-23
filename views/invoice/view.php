<?php

use app\models\Invoice;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Invoice */

$this->title = $model->number;
$this->params['breadcrumbs'][] = ['label' => 'Накладные', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="invoice-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'number',
            'invoiceDate',
            'organisation.name',
            'supplier.name',
            'summ',
            'isPayment',
            [
                'attribute' => 'file',
                'value' => function (Invoice $data) {
                    if ($data->file) {
                        return Html::a(Html::encode('Файл'), Url::to(Yii::$app->homeUrl . $data->file), ['target' => 'blank']);
                    } else {
                        return null;
                    }
                },
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
