<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\EmployeeDetail;

/**
 * EmployeeDetailSearch represents the model behind the search form about `backend\models\EmployeeDetail`.
 */
class EmployeeDetailSearch extends EmployeeDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_id', 'phone'], 'integer'],
            [['name', 'dob', 'address', 'email', 'field', 'history', 'sex', 'images'], 'safe'],
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
        $query = EmployeeDetail::find();

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
            'emp_id' => $this->emp_id,
            'dob' => $this->dob,
            'phone' => $this->phone,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'field', $this->field])
            ->andFilterWhere(['like', 'history', $this->history])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'images', $this->images]);

        return $dataProvider;
    }
}
