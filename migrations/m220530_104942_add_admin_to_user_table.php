<?php

use yii\db\Migration;

/**
 * Class m220530_104942_add_admin_to_user_table
 */
class m220530_104942_add_admin_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     *
     * Добавить суперадмина (перед применением миграций на севрере изменить логин-пароль)
     */
    public function safeUp()
    {
        $this->insert('user', [
            'id' => 1,
            'fname' => 'Снежана',
            'username' => 'r.snezhana',
            'email' => 'admin@site.ru',
            'password' => Yii::$app->getSecurity()->generatePasswordHash('Hz,byf34'),
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

}
