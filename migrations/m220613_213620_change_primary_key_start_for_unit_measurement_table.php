<?php

use yii\db\Migration;

/**
 * Class m220613_213620_change_primary_key_start_for_unit_measurement_table
 */
class m220613_213620_change_primary_key_start_for_unit_measurement_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('ALTER SEQUENCE unit_measurement_id_seq RESTART 100;');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }

}
