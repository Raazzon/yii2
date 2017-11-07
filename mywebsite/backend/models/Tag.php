<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tag".
 *
 * @property integer $id
 * @property string $seoTitle
 * @property string $seoKeywords
 * @property string $seoDescription
 * @property string $title
 * @property string $seoUrl
 * @property string $image
 * @property string $detail
 * @property integer $hits
 * @property string $postDate
 * @property integer $published
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seoDescription', 'title', 'detail'], 'string'],
            [['title', 'seoUrl'], 'required'],
            [['hits', 'published'], 'integer'],
            [['postDate'], 'safe'],
            [['seoTitle', 'seoKeywords', 'seoUrl', 'image'], 'string', 'max' => 255],
            [['seoUrl'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'seoTitle' => 'Seo Title',
            'seoKeywords' => 'Seo Keywords',
            'seoDescription' => 'Seo Description',
            'title' => 'Title',
            'seoUrl' => 'Seo Url',
            'image' => 'Image',
            'detail' => 'Detail',
            'hits' => 'Hits',
            'postDate' => 'Post Date',
            'published' => 'Published',
        ];
    }
}
