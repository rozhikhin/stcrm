<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%unit_measurement}}`.
 */
class m220606_163155_create_unit_measurement_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%unit_measurement}}', [
            'id' => $this->primaryKey(),
            'unit' => $this->string(50),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%unit_measurement}}');
    }
}
