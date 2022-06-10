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
            'name' => $this->string(200)->comment('Название номенклатуры'),
            'reg_number' => $this->string(100)->comment('Регистрационный (инвентарный номер'),
            'category_id' => $this->integer()->defaultValue(1)->comment('Категория номенклатуры - ссылка на таблицу категорий (nomenclature_category)'),
            'subcategory_id' => $this->integer()->comment('Подкатегория номенклатуры - ссылка на таблицу категорий (nomenclature_category)'),
            'count_in_store' => $this->float()->comment('Остаток на складе'),
            'unit_id' => $this->integer()->comment('Единицы измерения - Ссылка на таблицу единиц измерений (unit_measurement)'),
            'last_operation_id' => $this->integer()->comment('Последняя операция - Ссылка на последнюю операцию с этим товаром - (operation_history)'),
        ]);
        $this->addCommentOnTable('{{%nomenclature_list}}', 'Таблица со списком номенклатуры');

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
