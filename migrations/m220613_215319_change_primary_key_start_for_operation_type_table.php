<?php

use yii\db\Migration;

/**
 * Class m220613_215319_change_primary_key_start_for_operation_type_table
 */
class m220613_215319_change_primary_key_start_for_operation_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('ALTER SEQUENCE operation_type_id_seq RESTART 100;');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }

}
