<?php

use yii\db\Migration;

/**
 * Class m220627_154006_alter_table_invoice
 */
class m220627_154006_alter_table_invoice extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('invoice','date', $this->bigInteger()->notNull()->comment('Дата документа'));
        $this->addColumn('invoice', 'date_payment', $this->bigInteger()->comment('Дата платежа'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('invoice', 'date_payment');
    }

}
