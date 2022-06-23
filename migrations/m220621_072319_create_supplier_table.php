<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%supplier}}`.
 */
class m220621_072319_create_supplier_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%supplier}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->notNull()->comment('Название поставщика'),
            'address' => $this->string(250)->comment('Адрес поставщика'),
            'phone' => $this->string(30)->comment('Телефон поставщика'),
        ]);
        $this->addCommentOnTable('{{%supplier}}', 'Таблица с поставщиками)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%supplier}}');
    }
}
