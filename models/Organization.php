<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organization".
 *
 * @property int $id
 * @property string $name Название организации
 * @property string|null $address Адрес организации
 * @property string|null $phone Телефон организации
 *
 * @property Invoice[] $invoices
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organization';
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
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название организации',
            'address' => 'Адрес организации',
            'phone' => 'Телефон организации',
        ];
    }

    /**
     * Gets query for [[Invoices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoice::className(), ['organisation_id' => 'id']);
    }
}
