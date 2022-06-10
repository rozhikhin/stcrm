<?php

use yii\db\Migration;

/**
 * Class m220601_191212_add_index_and_fk_in_category_for_parent_category
 */
class m220601_191212_add_index_and_fk_in_category_for_parent_category extends Migration
{
    /**
     * {@inheritdoc}
     *
     * Добавить индекс и внешний ключ для таблицы номенклатуры (связь с таблицей категорий номенклатуры)
     */
    public function safeUp()
    {
        // creates index for column `last_operation_id`
        $this->createIndex(
            'idx-nomenclature_category-parent',
            'nomenclature_category',
            'parent_id'
        );

        // add foreign key for table `tool_category (operation_history)`
        $this->addForeignKey(
            'fk-nomenclature_category-parent',
            'nomenclature_category',
            'parent_id',
            'nomenclature_category',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-nomenclature_category-parent', 'nomenclature_category');
        $this->dropForeignKey('fk-nomenclature_category-parent', 'nomenclature_category');
    }

}
