<?php

use app\models\Invoice;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InvoiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Накладные';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новая накладная', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'number',
            'invoiceDate',
            [
                'attribute' => 'organisation_id',
                'value' => 'organisation.name'
            ],
            [
                'attribute' => 'supplier_id',
                'value' => 'supplier.name'
            ],
            'summ',
            'invoicePaymentDate',
            'isPayment',
//            [
//                'attribute' => 'file',
//                'value' => function (Invoice $data) {
//                    if ($data->file) {
//                        return Html::a(Html::encode('Файл'), Url::to(Yii::$app->homeUrl . $data->file), ['target' => 'blank']);
//                    } else {
//                        return null;
//                    }
//                },
//                'format' => 'raw',
//            ],
            'comment',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Invoice $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

</div>
