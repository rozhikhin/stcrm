<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee}}`.
 */
class m220531_155226_create_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employee}}', [
            'id' => $this->primaryKey(),
            'lname' => $this->string(200),
            'fname' => $this->string(200),
            'phone' => $this->string(200),
            'department_id' => $this->integer()->defaultValue(1),
        ]);

        // creates index for column `department_id`
        $this->createIndex(
            'idx-employee-department_id',
            'employee',
            'department_id'
        );

        // add foreign key for table `departments`
        $this->addForeignKey(
            'fk-employee-department_id',
            'employee',
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
        $this->dropTable('{{%employee}}');
    }
}
