<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "module".
 *
 * @property integer $id
 * @property string $title
 * @property string $uniqueName
 * @property string $detail
 * @property integer $published
 */
class Module extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'module';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'uniqueName'], 'required'],
            [['detail'], 'string'],
            [['published'], 'integer'],
            [['title', 'uniqueName'], 'string', 'max' => 45],
            [['uniqueName'], 'unique'],
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
            'uniqueName' => 'Unique Name',
            'detail' => 'Detail',
            'published' => 'Published',
        ];
    }
}
