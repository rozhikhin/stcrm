<?php

use yii\db\Migration;

/**
 * Class m220531_154339_add_default_category_to_nomenclature_category_table
 */
class m220531_154339_add_default_category_to_nomenclature_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('nomenclature_category', [
            'name' => 'Главная категория',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('nomenclature_category');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220531_154339_add_default_category_to_nomenclature_category_table cannot be reverted.\n";

        return false;
    }
    */
}
