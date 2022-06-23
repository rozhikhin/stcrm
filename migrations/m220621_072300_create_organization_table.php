<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%organization}}`.
 */
class m220621_072300_create_organization_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%organization}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->notNull()->comment('Название организации'),
            'address' => $this->string(250)->comment('Адрес организации'),
            'phone' => $this->string(30)->comment('Телефон организации'),
        ]);
        $this->addCommentOnTable('{{%organization}}', 'Таблица с организациями (своими)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%organization}}');
    }
}
