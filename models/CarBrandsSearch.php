<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CarBrands;

/**
 * CarBrandsSearch represents the model behind the search form of `app\models\CarBrands`.
 */
class CarBrandsSearch extends CarBrands
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_car_brands'], 'integer'],
            [['name_car_brands'], 'safe'],
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = CarBrands::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_car_brands' => $this->id_car_brands,
        ]);

        $query->andFilterWhere(['like', 'name_car_brands', $this->name_car_brands]);

        return $dataProvider;
    }
}
