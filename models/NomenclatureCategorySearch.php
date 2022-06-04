<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NomenclatureCategory;

/**
 * NomenclatureCategorySearch represents the model behind the search form of `app\models\NomenclatureCategory`.
 */
class NomenclatureCategorySearch extends NomenclatureCategory
{
    public $parent;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name'], 'safe'],
            [['parent_id'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {

        $query = NomenclatureCategory::find();

        // add conditions that should always apply here
        $query->joinWith(['parent']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['parent_id'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['parent_table.name' => SORT_ASC],
            'desc' => ['parent_table.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['ilike', 'nomenclature_category.name', $this->name])
        ->andFilterWhere(['ilike', 'parent_table.name', $this->parent_id]);

        return $dataProvider;
    }
}
