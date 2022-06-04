<?php

use yii\db\Migration;

/**
 * Class m220601_153725_add_index_and_fk_from_nomeclature_list_to_operation_history
 */
class m220601_153725_add_index_and_fk_from_nomeclature_list_to_operation_history extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // creates index for column `last_operation_id`
        $this->createIndex(
            'idx-nomenclature_list-last_operation_id',
            'nomenclature_list',
            'last_operation_id'
        );

        // add foreign key for table `tool_category (operation_history)`
        $this->addForeignKey(
            'fk-nomenclature_list-last_operation_id',
            'nomenclature_list',
            'last_operation_id',
            'operation_history',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-nomenclature_list-last_operation_id', 'nomenclature_list');
        $this->dropForeignKey('fk-nomenclature_list-last_operation_id', 'nomenclature_list');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220601_153725_add_index_and_fk_from_nomeclature_list_to_operation_history cannot be reverted.\n";

        return false;
    }
    */
}
