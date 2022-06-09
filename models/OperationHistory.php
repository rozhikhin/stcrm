<?php

namespace app\models;

use Yii;
use yii\base\InvalidConfigException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "operation_history".
 *
 * @property int $id
 * @property int|null $type_id
 * @property int|null $nomenclature_id
 * @property float|null $count_in_operation
 * @property int|null $employee_id
 * @property int|null $last_operation
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property NomenclatureList[] $nomenclatureLists
 * @property Employee $employee
 * @property String $employeeFullName
 * @property NomenclatureList $nomenclature
 * @property String $nomenclatureName
 * @property OperationType $operationType
 * @property String $operationTypeName
 * @property String $createdDate
 * @property String $updatedDate
 */
class OperationHistory extends ActiveRecord
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
            ],
        ];
    }

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
            [['created_at'], 'safe'],
            [['type_id', 'nomenclature_id', 'employee_id'], 'default', 'value' => null],
            [['last_operation'], 'default', 'value' => 1],
            [['type_id', 'nomenclature_id', 'employee_id', 'last_operation'], 'integer'],
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
            'type_id' => 'Тип операции',
            'nomenclature_id' => 'Номеклатура',
            'count_in_operation' => 'Количество',
            'employee_id' => 'Сотрудник',
            'last_operation' => 'Признак последней операции',
            'updated_at' => 'Дата последнего изменения',
            'created_at' => 'Дата создания',
        ];
    }

    /**
     * Gets query for [[NomenclatureLists]].
     *
     * @return ActiveQuery
     */
    public function getNomenclatureLists()
    {
        return $this->hasMany(NomenclatureList::class, ['last_operation_id' => 'id']);
    }

    /**
     * Convert 'created_at' timestamp to user-friendly date
     *
     * @return String
     *
     * @throws InvalidConfigException
     */
    public function getCreatedDate()
    {
        if ($this->created_at) {
            return Yii::$app->formatter->asDate($this->created_at);;
        } else {
            return null;
        }
    }

    /**
     * Convert 'updated_at' timestamp to user-friendly date
     *
     * @return String
     *
     * @throws InvalidConfigException
     */
    public function getUpdatedDate()
    {
        if ($this->created_at) {
            return Yii::$app->formatter->asDate($this->updated_at);;
        } else {
            return null;
        }
    }

    /**
     * Gets [[Employee]].
     *
     * @return ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::class, ['id' => 'employee_id']);
    }

    /**
     * Get Employee Full Name.
     *
     * @return String
     */
    public function getEmployeeFullName()
    {
        return $this->employee->lname . ' ' . $this->employee->fname;
    }

    /**
     * Gets query for [[NomenclatureList]].
     *
     * @return ActiveQuery
     */
    public function getNomenclature()
    {
        return $this->hasOne(NomenclatureList::class, ['id' => 'nomenclature_id']);
    }

    /**
     * Get Operation Type Name.
     *
     * @return String
     */
    public function getNomenclatureName()
    {
        if ($this->nomenclature) {
            return $this->nomenclature->name;
        }
        return null;
    }

    /**
     * Gets query for [[OperationType]].
     *
     * @return ActiveQuery
     */
    public function getOperationType()
    {
        return $this->hasOne(OperationType::class, ['id' => 'type_id']);
    }

    /**
     * Get Operation Type Name.
     *
     * @return String
     */
    public function getOperationTypeName()
    {
        if ($this->operationType) {
            return $this->operationType->name;
        }
        return null;
    }

    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $isLastOperation = $this::findOne([
                'nomenclature_id' => $this->nomenclature_id,
                'employee_id' => $this->employee_id,
                'last_operation' => 1]);
            if ($isLastOperation) {
                $isLastOperation->last_operation = 0;
                $isLastOperation->save();
            }
        }
        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        if($insert) {
            $lastOperationNomencature = NomenclatureList::findOne(['id' => $this->nomenclature_id]);
            $lastOperationNomencature->last_operation_id = $this->id;
            $lastOperationNomencature->save(false);
        }
    }

}
