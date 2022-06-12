<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "operation_type".
 *
 * @property int $id
 * @property string|null $name
 */
class OperationType extends \yii\db\ActiveRecord
{
    const INCOME_GOODS = 1; // Поступление товара
    const EXPENDITURE_GOODS = 2; // Расход товара
    const ISSUING_GOODS = 3; // Выдача штучного товара
    const RETURNS_GOODS = 4; // Возврат штучного товара
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operation_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
        ];
    }
}
