<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "usergroup".
 *
 * @property integer $id
 * @property string $title
 * @property string $detail
 * @property string $postDate
 * @property integer $published
 */
class Usergroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usergroup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['detail'], 'string'],
            [['postDate'], 'safe'],
            [['published'], 'integer'],
            [['title'], 'string', 'max' => 30],
            [['title'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'detail' => 'Detail',
            'postDate' => 'Post Date',
            'published' => 'Published',
        ];
    }
}
