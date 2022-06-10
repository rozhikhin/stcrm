<?php

use yii\db\Migration;

/**
 * Class m220530_104247_add_departmaent_to_department_table
 */
class m220530_104247_add_departmaent_to_department_table extends Migration
{
    /**
     * {@inheritdoc}
     *
     * Добавить подразделение по-умолчанию
     *
     */
    public function safeUp()
    {
        $this->insert('department', [
            'name' => 'Отдел не указан',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('department');
    }
}
