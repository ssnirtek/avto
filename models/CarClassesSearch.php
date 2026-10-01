<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CarClasses;

/**
 * CarClassesSearch represents the model behind the search form of `app\models\CarClasses`.
 */
class CarClassesSearch extends CarClasses
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_car_classes'], 'integer'],
            [['name_car_classes'], 'safe'],
            [['discount_car_classes'], 'number'],
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
        $query = CarClasses::find();

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
            'id_car_classes' => $this->id_car_classes,
            'discount_car_classes' => $this->discount_car_classes,
        ]);

        $query->andFilterWhere(['like', 'name_car_classes', $this->name_car_classes]);

        return $dataProvider;
    }
}
