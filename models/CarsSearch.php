<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cars;

/**
 * CarsSearch represents the model behind the search form of `app\models\Cars`.
 */
class CarsSearch extends Cars
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cars', 'brands_id', 'car_class_id', 'year', 'is_free'], 'integer'],
            [['model', 'number_car', 'color_car', 'description_car', 'image_car'], 'safe'],
            [['day_price'], 'number'],
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
        $query = Cars::find();

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
            'id_cars' => $this->id_cars,
            'brands_id' => $this->brands_id,
            'car_class_id' => $this->car_class_id,
            'year' => $this->year,
            'day_price' => $this->day_price,
            'is_free' => $this->is_free,
        ]);

        $query->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'number_car', $this->number_car])
            ->andFilterWhere(['like', 'color_car', $this->color_car])
            ->andFilterWhere(['like', 'description_car', $this->description_car])
            ->andFilterWhere(['like', 'image_car', $this->image_car]);

        return $dataProvider;
    }
}
