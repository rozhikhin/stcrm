<?php

use yii\db\Migration;

/**
 * Class m220627_162251_alter_table_invoice_add_comment
 */
class m220627_162251_alter_table_invoice_add_comment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('invoice', 'comment', $this->text()->comment('Комментарий'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('invoice', 'comment');
    }

}
