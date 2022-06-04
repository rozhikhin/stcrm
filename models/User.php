<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $fname
 * @property string|null $lname
 * @property string|null $username
 * @property string|null $email
 * @property string|null $password
 * @property string|null $phone
 * @property int $department_id
 * @property string|null $auth_key
 * @property string|null $access_token
 *
 * @property Department $department
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['department_id'], 'required'],
            [['department_id'], 'integer'],
            [['fname', 'lname', 'username', 'email'], 'string', 'max' => 100],
            [['password', 'auth_key', 'access_token'], 'string', 'max' => 200],
            [['phone'], 'string', 'max' => 30],
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
            'fname' => 'Fname',
            'lname' => 'Lname',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'phone' => 'Phone',
            'department_id' => 'Department ID',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
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
