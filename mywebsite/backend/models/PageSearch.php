<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Page;

/**
 * PageSearch represents the model behind the search form about `backend\models\Page`.
 */
class PageSearch extends Page
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'module_id', 'user_id', 'category_id', 'hits', 'hide', 'published'], 'integer'],
            [['seoTitle', 'seoDescription', 'title', 'seoUrl', 'image', 'imageSource', 'intro', 'detail', 'nextReview', 'publishedOn', 'modifiedOn', 'postDate'], 'safe'],
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
        $query = Page::find();

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
            'id' => $this->id,
            'module_id' => $this->module_id,
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
            'hits' => $this->hits,
            'hide' => $this->hide,
            'nextReview' => $this->nextReview,
            'publishedOn' => $this->publishedOn,
            'modifiedOn' => $this->modifiedOn,
            'postDate' => $this->postDate,
            'published' => $this->published,
        ]);

        $query->andFilterWhere(['like', 'seoTitle', $this->seoTitle])
            ->andFilterWhere(['like', 'seoDescription', $this->seoDescription])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'seoUrl', $this->seoUrl])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'imageSource', $this->imageSource])
            ->andFilterWhere(['like', 'intro', $this->intro])
            ->andFilterWhere(['like', 'detail', $this->detail]);

        return $dataProvider;
    }
}
