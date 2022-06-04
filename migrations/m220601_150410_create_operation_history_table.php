<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%operation_history}}`.
 */
class m220601_150410_create_operation_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%operation_history}}', [
            'id' => $this->primaryKey(),
            'date' => $this->date(), // Дата операции
            'type' => $this->integer(), // Тип операции - Ссылка - operation_type_id
            'nomenclature' => $this->integer(), // Едидница номенклатуры в операции - Ссылка - operation_type_id
            'count_in_operation' => $this->float(), // Количество номенклатуры (в ее единицах измерения), задействованного в операции
            'employee' => $this->integer(), // Сотрудник (получивший что-то со склада - Ссылка - employee->id
            'last_operation' => $this->integer() //Логическое значение (0 или 1) Самая последняя операция для связки - Пользователь - > Номенклатура (чтобы можно было посмотреть последние операции для указанного пользователя с указанной номенклатурой)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%operation_history}}');
    }
}
