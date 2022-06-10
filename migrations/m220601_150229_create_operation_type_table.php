<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%operation_type}}`.
 */
class m220601_150229_create_operation_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%operation_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->notNull()->unique()->comment('Название типа операций')
        ]);
        $this->addCommentOnTable('{{%operation_type}}', 'Таблица типов операций');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%operation_type}}');
    }
}
