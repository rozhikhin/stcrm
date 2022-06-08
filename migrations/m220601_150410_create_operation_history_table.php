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
            'id' => $this->primaryKey()->comment('Первичный ключ'),
            'type_id' => $this->integer()->notNull()->comment('Тип операции - Ссылка - operation_type->id'),
            'nomenclature_id' => $this->integer()->notNull()->comment('Едидница номенклатуры в операции - Ссылка - nomenclature_list -> id'),
            'count_in_operation' => $this->float()->notNull()->comment('Количество номенклатуры (в ее единицах измерения), задействованного в операции'),
            'employee_id' => $this->integer()->notNull()->comment('Сотрудник (получивший что-то со склада (или вернувший на склад) - Ссылка - employee->id'),
            'last_operation' => $this->integer()->notNull()->defaultValue(1)->comment('Логическое значение (0 или 1) Самая последняя операция для связки - Пользователь - > Номенклатура (чтобы можно было посмотреть последние операции для указанного пользователя с указанной номенклатурой)'),
            'created_at' => $this->integer()->notNull()->comment('Timestamp - дата и время создания'),
            'updated_at' => $this->integer()->notNull()->comment('Timestamp - дата и время последнего изменения')
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
