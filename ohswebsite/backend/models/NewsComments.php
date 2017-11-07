<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "news_comments".
 *
 * @property integer $news_id
 * @property integer $comments_id
 * @property integer $user_id
 * @property string $comments
 * @property string $date
 */
class NewsComments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id', 'user_id', 'comments', 'date'], 'required'],
            [['news_id', 'user_id'], 'integer'],
            [['comments'], 'string', 'max' => 200],
            [['date'], 'string', 'max' => 33],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'news_id' => 'News ID',
            'comments_id' => 'Comments ID',
            'user_id' => 'User ID',
            'comments' => 'Comments',
            'date' => 'Date',
        ];
    }
}
