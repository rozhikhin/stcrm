<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property int $id
 * @property string $name Название поставщика
 * @property string|null $address Адрес поставщика
 * @property string|null $phone Телефон поставщика
 * @property string|null $comment Комментарий
 *
 * @property Invoice[] $invoices
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 200],
            [['address'], 'string', 'max' => 250],
            [['phone'], 'string', 'max' => 30],
            [['comment'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название поставщика',
            'address' => 'Адрес поставщика',
            'phone' => 'Телефон поставщика',
            'comment' => 'Комментарий',
        ];
    }

    /**
     * Gets query for [[Invoices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoice::className(), ['supplier_id' => 'id']);
    }
}
