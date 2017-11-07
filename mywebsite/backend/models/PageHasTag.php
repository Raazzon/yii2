<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "page_has_tag".
 *
 * @property integer $page_id
 * @property integer $tag_id
 */
class PageHasTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page_has_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id', 'tag_id'], 'required'],
            [['page_id', 'tag_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'page_id' => 'Page ID',
            'tag_id' => 'Tag ID',
        ];
    }
}
