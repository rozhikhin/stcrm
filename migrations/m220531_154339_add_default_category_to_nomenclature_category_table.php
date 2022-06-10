<?php

use yii\db\Migration;

/**
 * Class m220531_154339_add_default_category_to_nomenclature_category_table
 */
class m220531_154339_add_default_category_to_nomenclature_category_table extends Migration
{
    /**
     * {@inheritdoc}
     *
     * Добавить котегорию по-умолчанию
     */
    public function safeUp()
    {
        $this->insert('nomenclature_category', [
            'id' => 1,
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

}
