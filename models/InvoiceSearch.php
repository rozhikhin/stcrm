<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Invoice;

/**
 * InvoiceSearch represents the model behind the search form of `app\models\Invoice`.
 */
class InvoiceSearch extends Invoice
{
    public $invoiceDate;
    public $invoicePaymentDate;
    public $isPayment;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'payment'], 'integer'],
            [['organisation_id', 'supplier_id', 'isPayment'], 'string'],
            [['number', 'file', 'date', 'payment_date'], 'safe'],
            [['summ'], 'number'],
            [['invoiceDate', 'invoicePaymentDate'], 'date', 'format' => 'dd.MM.yyyy'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Invoice::find();

        // add conditions that should always apply here
        $query->joinWith(['organisation']);
        $query->joinWith(['supplier']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'number',
                'invoiceDate' => [
                    'asc'     => ['date' => SORT_ASC],
                    'desc'    => ['date' => SORT_DESC],
//                    'label'   => 'Department',
                    'default' => SORT_ASC
                ],
                'organisation_id',
                'supplier_id',
                'summ',
                'invoicePaymentDate' => [
                    'asc'     => ['date' => SORT_ASC],
                    'desc'    => ['date' => SORT_DESC],
                    'default' => SORT_ASC
                ],
                'isPayment' => [
                    'asc'     => ['payment' => SORT_ASC],
                    'desc'    => ['payment' => SORT_DESC],
                    'default' => SORT_ASC
                ],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'summ' => $this->summ,
        ]);

        $query->andFilterWhere(['ilike', 'number', $this->number])
            ->andFilterWhere(['=', 'date', $this->invoiceDate && strlen($this->invoiceDate) == 10 ? strtotime($this->invoiceDate) : null])
            ->andFilterWhere(['ilike', 'organization.name', $this->organisation_id])
            ->andFilterWhere(['ilike', 'supplier.name', $this->supplier_id])
            ->andFilterWhere(['=', 'date_payment', $this->invoicePaymentDate && strlen($this->invoicePaymentDate) == 10 ? strtotime($this->invoicePaymentDate) : null]);

        return $dataProvider;
    }
}
