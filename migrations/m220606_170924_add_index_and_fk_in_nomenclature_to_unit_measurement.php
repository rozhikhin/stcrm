<?php

use yii\db\Migration;

/**
 * Class m220606_170924_add_index_and_fk_in_nomenclature_to_unit_measurement
 */
class m220606_170924_add_index_and_fk_in_nomenclature_to_unit_measurement extends Migration
{
    /**
     * {@inheritdoc}
     *
     * Дабавить индекс и внешний ключ для таблицы номенклатуры - связь с таблицей единиц измерений
     */
    public function safeUp()
    {
        // creates index for column `unit_id`
        $this->createIndex(
            'idx-nomenclature_list-unit_id',
            'nomenclature_list',
            'unit_id'
        );

        // add foreign key for table `unit_measurement`
        $this->addForeignKey(
            'fk-nomenclature_list-unit_id',
            'nomenclature_list',
            'unit_id',
            'unit_measurement',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        $this->dropIndex('idx-nomenclature_list-unit_id', 'nomenclature_list');
//        $this->dropForeignKey('fk-nomenclature_list-unit_id', 'nomenclature_list');
    }

}
