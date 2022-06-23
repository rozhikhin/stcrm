<?php

use yii\db\Migration;

/**
 * Class m220623_132528_alter_table_supplier
 */
class m220623_132528_alter_table_supplier extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('supplier','phone', $this->string()->defaultValue(null));
        $this->addColumn('supplier', 'comment', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('supplier', 'comment');
    }

}
