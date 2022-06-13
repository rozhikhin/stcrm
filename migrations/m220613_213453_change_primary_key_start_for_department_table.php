<?php

use yii\db\Migration;

/**
 * Class m220613_213453_change_primary_key_start_for_department_table
 */
class m220613_213453_change_primary_key_start_for_department_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('ALTER SEQUENCE department_id_seq RESTART 100;');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }

}
