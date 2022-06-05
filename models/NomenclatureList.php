<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nomenclature_list".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $reg_number
 * @property int|null $category_id
 * @property int|null $subcategory_id
 * @property float|null $count_in_store
 * @property int|null $last_operation_id
 *
 * @property NomenclatureCategory $category
 * @property NomenclatureCategory $category0
 * @property OperationHistory $lastOperation
 */
class NomenclatureList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nomenclature_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'subcategory_id', 'last_operation_id'], 'default', 'value' => null],
            [['category_id', 'subcategory_id', 'last_operation_id'], 'integer'],
            [['count_in_store'], 'number'],
            [['name'], 'string', 'max' => 200],
            [['reg_number'], 'string', 'max' => 100],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => NomenclatureCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => NomenclatureCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['last_operation_id'], 'exist', 'skipOnError' => true, 'targetClass' => OperationHistory::className(), 'targetAttribute' => ['last_operation_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'reg_number' => 'Reg Number',
            'category_id' => 'Category ID',
            'subcategory_id' => 'Subcategory ID',
            'count_in_store' => 'Count In Store',
            'last_operation_id' => 'Last Operation ID',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(NomenclatureCategory::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Category0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(NomenclatureCategory::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[LastOperation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLastOperation()
    {
        return $this->hasOne(OperationHistory::className(), ['id' => 'last_operation_id']);
    }
}
