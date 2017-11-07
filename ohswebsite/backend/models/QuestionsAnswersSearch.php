<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\QuestionsAnswers;

/**
 * QuestionsAnswersSearch represents the model behind the search form about `backend\models\QuestionsAnswers`.
 */
class QuestionsAnswersSearch extends QuestionsAnswers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ans_id', 'ques_id', 'emp_id'], 'integer'],
            [['answer', 'date'], 'safe'],
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
        $query = QuestionsAnswers::find();

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
            'ans_id' => $this->ans_id,
            'ques_id' => $this->ques_id,
            'emp_id' => $this->emp_id,
        ]);

        $query->andFilterWhere(['like', 'answer', $this->answer])
            ->andFilterWhere(['like', 'date', $this->date]);

        return $dataProvider;
    }
}
