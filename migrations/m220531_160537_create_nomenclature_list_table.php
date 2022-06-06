<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nomenclature_list}}`.
 */
class m220531_160537_create_nomenclature_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%nomenclature_list}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200),
            'reg_number' => $this->string(100), // Инвентарный номер
            'category_id' => $this->integer()->defaultValue(1), // Категория - Ссылка - nomenclature_category->id
            'subcategory_id' => $this->integer(), // Подкатегория - Ссылка - nomenclature_category->id
            'count_in_store' => $this->float(), // Остаток на складе
            'unit_id' => $this->integer(), // Единицы измерения - Ссылка -
            'last_operation_id' => $this->integer(), // Номер последней операции - Ссылка на последнюю операцию с этим товаром - operation_history->id
//            'last_operation_type' => $this->integer(), // Тип последней операции - Ссылка - operation_history->type
//            'last_operation_date' => $this->date(), // Дата последней операции - Ссылка - operation_history->date
//            'last_user' => $this->integer(), // Сотрудник последней в операции - Ссылка - operation_history->user
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            'idx-nomenclature_list-category_id',
            'nomenclature_list',
            'category_id'
        );

        // add foreign key for table `nomenclature_category`
        $this->addForeignKey(
            'fk-nomenclature_list-category_id',
            'nomenclature_list',
            'category_id',
            'nomenclature_category',
            'id',
            'RESTRICT'
        );

        // creates index for column `subcategory_id`
        $this->createIndex(
            'idx-nomenclature_list-subcategory_id',
            'nomenclature_list',
            'subcategory_id'
        );

        // add foreign key for table `nomenclature_category (subcategory_id)`
        $this->addForeignKey(
            'fk-nomenclature_list-subcategory_id',
            'nomenclature_list',
            'category_id',
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
        $this->dropTable('{{%nomenclature_list}}');
    }
}
