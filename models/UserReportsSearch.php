<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserReports;

/**
 * UserReportsSearch represents the model behind the search form of `app\models\UserReports`.
 */
class UserReportsSearch extends UserReports
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user_reports', 'rental_request_id'], 'integer'],
            [['description_reports', 'image_reports', 'notes_reports'], 'safe'],
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
        $query = UserReports::find();

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
            'id_user_reports' => $this->id_user_reports,
            'rental_request_id' => $this->rental_request_id,
        ]);

        $query->andFilterWhere(['like', 'description_reports', $this->description_reports])
            ->andFilterWhere(['like', 'image_reports', $this->image_reports])
            ->andFilterWhere(['like', 'notes_reports', $this->notes_reports]);

        return $dataProvider;
    }
}
