<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RentalRequests;

/**
 * RentalRequestsSearch represents the model behind the search form of `app\models\RentalRequests`.
 */
class RentalRequestsSearch extends RentalRequests
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_rental_requests', 'user_id', 'car_id', 'day_count'], 'integer'],
            [['start_date', 'status', 'notes', 'created_requests'], 'safe'],
            [['day_price', 'discount'], 'number'],
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
        $query = RentalRequests::find();

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
            'id_rental_requests' => $this->id_rental_requests,
            'user_id' => $this->user_id,
            'car_id' => $this->car_id,
            'start_date' => $this->start_date,
            'day_count' => $this->day_count,
            'day_price' => $this->day_price,
            'discount' => $this->discount,
            'created_requests' => $this->created_requests,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
