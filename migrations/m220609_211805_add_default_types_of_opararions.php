<?php

use yii\db\Migration;

/**
 * Class m220609_211805_add_default_types_of_opararions
 *
 * Добавить типы оперций по-умолчанию
 */
class m220609_211805_add_default_types_of_opararions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%operation_type}}',['id', 'name'], [
            ['id' => 1, 'name' => 'Приход'],
            ['id' => 2, 'name' => 'Расход'],
            ['id' => 3, 'name' => 'Выдача'],
            ['id' => 4, 'name' => 'Возврат'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%operation_type}}');
    }

}
