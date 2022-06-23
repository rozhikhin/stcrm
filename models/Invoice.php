<?php

namespace app\models;

use Yii;
use yii\base\InvalidConfigException;
use yii\web\UploadedFile;

/**
 * This is the model class for table "invoice".
 *
 * @property int $id
 * @property string $number Номер документа
 * @property int $date Дата документа - timestamp
 * @property string $invoiceDate Дата документа user-friendly
 * @property int $organisation_id Своя организация
 * @property int $supplier_id Поставщик
 * @property float $summ Сумма платежа
 * @property int $payment Оплачено (1 или 0)
 * @property int $isPayment Оплачено (ДА или НЕТ)
 * @property string $file Ссылка на файл документа
 * @property UploadedFile $imageFile  Файл
 *
 *
 * @property Organization $organisation
 * @property Supplier $supplier
 */
class Invoice extends \yii\db\ActiveRecord
{

    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'date', 'organisation_id', 'supplier_id', 'summ', 'payment'], 'required'],
            [['date', 'organisation_id', 'supplier_id', 'payment'], 'default', 'value' => null],
            [['organisation_id', 'supplier_id', 'payment'], 'integer'],
            [['summ'], 'number'],
            [['number', 'date'], 'string', 'max' => 100],
            [['file'], 'string', 'max' => 255],
            [['organisation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['organisation_id' => 'id']],
            [['supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Supplier::className(), 'targetAttribute' => ['supplier_id' => 'id']],
            [['imageFile'], 'file'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Номер документа',
            'date' => 'Дата документа',
            'invoiceDate' => 'Дата документа',
            'organisation_id' => 'Своя организация',
            'supplier_id' => 'Поставщик',
            'summ' => 'Сумма платежа',
            'payment' => 'Оплачено',
            'isPayment' => 'Оплачено',
            'file' => 'Ссылка',
        ];
    }

    /**
     * Gets query for [[Organisation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganisation()
    {
        return $this->hasOne(Organization::className(), ['id' => 'organisation_id']);
    }

    /**
     * Gets query for [[Supplier]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Supplier::className(), ['id' => 'supplier_id']);
    }

    /**
     * Convert 'date' timestamp to user-friendly date
     *
     * @return String
     *
     * @throws InvalidConfigException
     */
    public function getInvoiceDate()
    {
        if ($this->date) {
            return Yii::$app->formatter->asDate($this->date, 'dd.MM.yyyy');
        } else {
            return null;
        }
    }

    /**
     * @return string
     */
    public function getIsPayment()
    {
        if ($this->payment) {
            return 'Да';
        }
        return 'Нет';
    }

    /**
     * @return bool
     */
    public function upload()
    {
        $this->imageFile = UploadedFile::getInstance($this, 'imageFile');
        if ($this->imageFile) {
            $this->file  = 'uploads/' . $this->number. '_' . time() .'.' . $this->imageFile->extension;
            $this->imageFile->saveAs($this->file);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        $this->date = strtotime($this->date);
        return parent::beforeSave($insert);
    }
}
