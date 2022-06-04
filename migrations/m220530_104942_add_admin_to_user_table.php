<?php

use yii\db\Migration;

/**
 * Class m220530_104942_add_admin_to_user_table
 */
class m220530_104942_add_admin_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user', [
            'fname' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@site.ru',
            'password' => Yii::$app->getSecurity()->generatePasswordHash('admin'),
            'department_id' => 1
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220530_104942_add_admin_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
