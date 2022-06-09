<?php

use yii\db\Migration;

/**
 * Class m220609_212231_add_default_unit_of_measurement
 */
class m220609_212231_add_default_unit_of_measurement extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220609_212231_add_default_unit_of_measurement cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220609_212231_add_default_unit_of_measurement cannot be reverted.\n";

        return false;
    }
    */
}
