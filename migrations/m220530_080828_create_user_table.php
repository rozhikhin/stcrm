<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m220530_080828_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'fname' => $this->string(100)->notNull()->comment('Имя пользователя'),
            'lname' => $this->string(100)->comment('Фамилия пользователя'),
            'username' => $this->string(100)->notNull()->comment('Логин пользователя'),
            'email' => $this->string(100)->unique()->comment('Email пользователя'),
            'password' => $this->string(200)->comment('Хеш пароля пользователя'),
            'phone' => $this->string(30)->comment('Телефон пользователя'),
            'department_id' => $this->integer()->defaultValue(1)->comment('Ссылка - Department - подразделение пользователя'),
            'auth_key' => $this->string(200)->comment('Ключ авторизации'),
            'access_token' => $this->string(200)->comment('Токен доступа'),
        ]);
        $this->addCommentOnTable('{{%user}}', 'Таблица пользователей системы');


        // creates index for column `department_id`
        $this->createIndex(
            'idx-user-department_id',
            'user',
            'department_id'
        );

        // add foreign key for table `departments`
        $this->addForeignKey(
            'fk-user-department_id',
            'user',
            'department_id',
            'department',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-user-department_id', 'user');
        $this->dropForeignKey('fk-user-department_id', 'user');
        $this->dropTable('{{%user}}');
    }
}
