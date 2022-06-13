<?php

use yii\db\Migration;

/**
 * Class m220609_212231_add_default_unit_of_measurement
 */
class m220609_212231_add_default_unit_of_measurement extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%unit_measurement}}',['id', 'unit', 'description'], [
            ['id' => 1, 'unit' => 'шт', 'description' => 'Штука'],
            ['id' => 2, 'unit' => 'л', 'description' => 'Литр'],
            ['id' => 3, 'unit' => 'кг', 'description' => 'Килограмм'],
            ['id' => 4, 'unit' => 'м', 'description' => 'Метр'],
            ['id' => 5, 'unit' => 'см', 'description' => 'Сантиметр'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-nomenclature_list-unit_id', 'nomenclature_list');
        $this->dropForeignKey('fk-nomenclature_list-unit_id', 'nomenclature_list');
        $this->delete('{{%unit_measurement}}');
    }

}
