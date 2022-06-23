<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%invoice}}`.
 */
class m220621_072334_create_invoice_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%invoice}}', [
            'id' => $this->primaryKey(),
            'number' => $this->string(100)->notNull()->comment('Номер документа'),
            'date' => $this->integer()->notNull()->comment('Дата документа'),
            'organisation_id' => $this->integer()->notNull()->comment('Своя организация'),
            'supplier_id' => $this->integer()->notNull()->comment('Поставщик'),
            'summ' => $this->float()->notNull()->comment('Сумма платежа'),
            'payment' => $this->smallInteger()->notNull()->comment('Оплачено (ДА или НЕТ'),
            'file' => $this->string()->comment('Ссылка на файл документа')
        ]);
        $this->addCommentOnTable('{{%invoice}}', 'Таблица с накладными)');

        // creates index for column `organisation_id`
        $this->createIndex(
            'idx-invoice-organisation_id',
            'invoice',
            'organisation_id'
        );

        // add foreign key for table `organisation`
        $this->addForeignKey(
            'fk-invoice-organisation_id',
            'invoice',
            'organisation_id',
            'organization',
            'id',
            'RESTRICT'
        );

        // creates index for column `supplier_id`
        $this->createIndex(
            'idx-invoice-supplier_id',
            'invoice',
            'supplier_id'
        );

        // add foreign key for table `organisation`
        $this->addForeignKey(
            'fk-invoice-supplier_id',
            'invoice',
            'supplier_id',
            'supplier',
            'id',
            'RESTRICT'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-invoice-organisation_id', 'invoice');
        $this->dropForeignKey('fk-invoice-organisation_id', 'invoice');
        $this->dropIndex('idx-invoice-supplier_id', 'invoice');
        $this->dropForeignKey('fk-invoice-supplier_id', 'invoice');
        $this->dropTable('{{%invoice}}');
    }
}
