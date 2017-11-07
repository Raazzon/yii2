<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AskedQuestions;

/**
 * AskedQuestionsSearch represents the model behind the search form about `backend\models\AskedQuestions`.
 */
class AskedQuestionsSearch extends AskedQuestions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'ques_id', 'age'], 'integer'],
            [['ques_topic', 'ques_details', 'symptoms', 'field', 'sex', 'date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = AskedQuestions::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'ques_id' => $this->ques_id,
            'age' => $this->age,
        ]);

        $query->andFilterWhere(['like', 'ques_topic', $this->ques_topic])
            ->andFilterWhere(['like', 'ques_details', $this->ques_details])
            ->andFilterWhere(['like', 'symptoms', $this->symptoms])
            ->andFilterWhere(['like', 'field', $this->field])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'date', $this->date]);

        return $dataProvider;
    }
}
