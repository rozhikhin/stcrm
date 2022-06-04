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
            'name' => $this->string(200),
            'parent' => $this->integer()->defaultValue(Null)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%nomenclature_category}}');
    }
}
