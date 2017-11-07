<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "page_has_page".
 *
 * @property integer $page_id
 * @property integer $page_id1
 *
 * @property Page $page
 * @property Page $pageId1
 */
class PageHasPage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page_has_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id', 'page_id1'], 'required'],
            [['page_id', 'page_id1'], 'integer'],
            [['page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Page::className(), 'targetAttribute' => ['page_id' => 'id']],
            [['page_id1'], 'exist', 'skipOnError' => true, 'targetClass' => Page::className(), 'targetAttribute' => ['page_id1' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'page_id' => 'Page ID',
            'page_id1' => 'Page Id1',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(Page::className(), ['id' => 'page_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageId1()
    {
        return $this->hasOne(Page::className(), ['id' => 'page_id1']);
    }
}
