<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unit_measurement".
 *
 * @property int $id
 * @property string|null $unit
 *
 * @property NomenclatureList[] $nomenclatureLists
 */
class UnitMeasurement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unit_measurement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['unit'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'unit' => 'Единица измерения',
        ];
    }

    /**
     * Gets query for [[NomenclatureLists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNomenclatureLists()
    {
        return $this->hasMany(NomenclatureList::className(), ['unit_id' => 'id']);
    }
}
