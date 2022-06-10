<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nomenclature_category}}`.
 */
class m220531_154122_create_nomenclature_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%nomenclature_category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->notNull()->unique()->comment('Название категории'),
            'parent_id' => $this->integer()->defaultValue(Null)->comment('Ссылка (на эту же таблицу) - родительская категория ')
        ]);
        $this->addCommentOnTable('{{%nomenclature_category}}', 'Таблица категорий номенклатуры');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%nomenclature_category}}');
    }
}
