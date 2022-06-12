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
 * @property int|null $unit_id
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
            [['count_in_store'], 'default', 'value' => 0],
            [['name'], 'string', 'max' => 200],
            [['unit_id'], 'string', 'max' => 50],
            [['reg_number'], 'string', 'max' => 100],
            [['unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => UnitMeasurement::class, 'targetAttribute' => ['unit_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => NomenclatureCategory::class, 'targetAttribute' => ['category_id' => 'id']],
            [['last_operation_id'], 'exist', 'skipOnError' => true, 'targetClass' => OperationHistory::class, 'targetAttribute' => ['last_operation_id' => 'id']],
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
            'reg_number' => 'Рег номер',
            'category_id' => 'Категория',
            'subcategory_id' => 'Покатегория',
            'unit_id' => 'Единицы измерения',
            'count_in_store' => 'Количесво на складе',
            'last_operation_id' => 'Последняя оперция',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(NomenclatureCategory::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Category0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(NomenclatureCategory::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[LastOperation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLastOperation()
    {
        return $this->hasOne(OperationHistory::class, ['id' => 'last_operation_id']);
    }

    /**
     * Gets query for [[Unit]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(UnitMeasurement::class, ['id' => 'unit_id']);
    }

    /**
     * @param OperationType $operationType
     * @param $count
     * @return void
     *
     * Изменение количества номенклатуры в зависимости от типа операции
     */
    public function changeCountInStore(OperationType $operationType, $count)
    {
        switch ($operationType->id) {
            case OperationType::INCOME_GOODS :
            case OperationType::RETURNS_GOODS :
                $this->count_in_store += $count;
                break;
            case OperationType::EXPENDITURE_GOODS:
            case OperationType::ISSUING_GOODS:
                $this->count_in_store -= $count;
                break;
        }
    }

    /**
     * @param NomenclatureList $model
     * @param OperationHistory $operation
     * @return void
     *
     * Установка ссылки на последнюю операцию с данной номенклатурой в списке номенклатуры
     * и изменение количества номенклатуры в зависимости от типа операции
     */
    public function updateAfterAddNewOperation(NomenclatureList $model, OperationHistory $operation)
    {
        $model->last_operation_id = $operation->id;
        $model->changeCountInStore($operation->operationType, $operation->count_in_operation);
        $model->save(false);
    }
}
