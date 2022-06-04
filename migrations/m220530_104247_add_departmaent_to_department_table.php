<?php

use yii\db\Migration;

/**
 * Class m220530_104247_add_departmaent_to_department_table
 */
class m220530_104247_add_departmaent_to_department_table extends Migration
{
    /**
     * {@inheritdoc}
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

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220530_104247_add_departmaent_to_department_table cannot be reverted.\n";

        return false;
    }
    */
}
