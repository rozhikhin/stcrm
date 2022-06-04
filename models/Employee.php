<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string|null $lname
 * @property string|null $fname
 * @property string|null $phone
 * @property int|null $department_id
 *
 * @property Department $department
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['department_id'], 'default', 'value' => 1],
            [['department_id'], 'integer'],
            [['lname', 'fname', 'phone'], 'string', 'max' => 200],
            [['lname', 'fname', 'phone'], 'required'],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lname' => 'Имя',
            'fname' => 'Фамилия',
            'phone' => 'Телефон',
            'department_id' => 'Отдел',
        ];
    }

    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }
}
