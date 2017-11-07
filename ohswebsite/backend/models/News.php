<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $news_id
 * @property string $title
 * @property string $image
 * @property string $author
 * @property string $date
 * @property string $detail
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'image', 'author', 'date', 'detail'], 'required'],
            [['date'], 'safe'],
            [['detail'], 'string'],
            [['title', 'image'], 'string', 'max' => 55],
            [['author'], 'string', 'max' => 33],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'news_id' => 'News ID',
            'title' => 'Title',
            'image' => 'Image',
            'author' => 'Author',
            'date' => 'Date',
            'detail' => 'Detail',
        ];
    }
}
