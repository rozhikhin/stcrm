<?php

use yii\db\Migration;

/**
 * Class m220606_170924_add_index_and_fk_in_nomenclature_to_unit_measurement
 */
class m220606_170924_add_index_and_fk_in_nomenclature_to_unit_measurement extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // creates index for column `unit_id`
        $this->createIndex(
            'idx-nomenclature_list-unit_id',
            'nomenclature_list',
            'unit_id'
        );

        // add foreign key for table `unit_measurement`
        $this->addForeignKey(
            'fk-nomenclature_list-unit_id',
            'nomenclature_list',
            'unit_id',
            'unit_measurement',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220606_170924_add_index_and_fk_in_nomenclature_to_unit_measurement cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220606_170924_add_index_and_fk_in_nomenclature_to_unit_measurement cannot be reverted.\n";

        return false;
    }
    */
}
