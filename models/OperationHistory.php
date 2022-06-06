<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "operation_history".
 *
 * @property int $id
 * @property string|null $date
 * @property int|null $type
 * @property int|null $nomenclature
 * @property float|null $count_in_operation
 * @property int|null $employee
 * @property int|null $last_operation
 *
 * @property NomenclatureList[] $nomenclatureLists
 */
class OperationHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operation_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['type', 'nomenclature', 'employee', 'last_operation'], 'default', 'value' => null],
            [['type', 'nomenclature', 'employee', 'last_operation'], 'integer'],
            [['count_in_operation'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата',
            'type' => 'Тип опреции',
            'nomenclature' => 'Номенклатура',
            'count_in_operation' => 'Количество товара в оперции',
            'employee' => 'Сотрудник',
            'last_operation' => 'Последняя операция (пользолватель + номенклатура)',
        ];
    }

    /**
     * Gets query for [[NomenclatureLists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNomenclatureLists()
    {
        return $this->hasMany(NomenclatureList::className(), ['last_operation_id' => 'id']);
    }

    public function getOperationType()
    {
        return $this->hasOne(OperationType::className(), ['id' => 'type']);
    }
}
