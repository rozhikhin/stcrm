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
            'fname' => $this->string(100)->notNull(),
            'lname' => $this->string(100),
            'username' => $this->string(100)->notNull(),
            'email' => $this->string(100),
            'password' => $this->string(200),
            'phone' => $this->string(30),
            'department_id' => $this->integer()->defaultValue(1),
            'auth_key' => $this->string(200),
            'access_token' => $this->string(200),
        ]);


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
        $this->dropTable('{{%user}}');
    }
}
