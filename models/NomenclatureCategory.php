<?php

namespace app\models;

use PDO;
use Yii;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "nomenclature_category".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $parent_id
 *
 * @property NomenclatureCategory[] $nomenclatureCategories
 * @property NomenclatureList[] $nomenclatureLists
 * @property NomenclatureList[] $nomenclatureLists0
 * @property NomenclatureCategory $parent
 */
class NomenclatureCategory extends \yii\db\ActiveRecord
{
//    public $parentName;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nomenclature_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent'], 'default', 'value' => null],
            [['parent_id'], 'integer'],
            [['parent'], 'safe'],
            [['name'], 'string', 'max' => 200],
            [['name'], 'unique'],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => NomenclatureCategory::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'parent_id' => 'Родительская категория',
            'parent' => 'Родительская категория',
        ];
    }

    /**
     * Gets query for [[NomenclatureCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNomenclatureCategories()
    {
        return $this->hasMany(NomenclatureCategory::className(), ['parent_id' => 'id']);
    }

    /**
     * Gets query for [[NomenclatureLists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNomenclatureLists()
    {
        return $this->hasMany(NomenclatureList::className(), ['category_id' => 'id']);
    }

    /**
     * Gets query for [[NomenclatureLists0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNomenclatureLists0()
    {
        return $this->hasMany(NomenclatureList::className(), ['category_id' => 'id']);
    }

    /**
     * Gets query for [[Parent].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(static::className(), ['id' => 'parent_id'])->from(['parent_table' => static::tableName()]);
    }

    /*
     * При обновлении в select ролительской категории пердаем все строки,
     * за исключением самого редактируемого объекта и всех дочених (включая дете детей и тд)
     * Рекурсивно выбираем всех потомкой объекта с переданным $id и всех его потомков.
     */
    public function getAllowedParentCategories($id = 0)
    {
        $connection=Yii::$app->db;
        $command=$connection->createCommand('
        
            WITH RECURSIVE r AS (
               SELECT id, name, parent_id
               FROM nomenclature_category
               WHERE id = :id
            
               UNION
            
               SELECT nc.id, nc.name, nc.parent_id
               FROM nomenclature_category nc
                  JOIN r
                      ON nc.parent_id = r.id
            )
            
            SELECT * FROM nomenclature_category
            EXCEPT
            SELECT * FROM r;
        
        ');
        $command->bindParam(":id",$id,PDO::PARAM_INT);
        $allowedParentCategories = $command->queryAll();
        return ArrayHelper::map($allowedParentCategories,'id','name');

    }

}
