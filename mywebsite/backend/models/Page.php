<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property integer $module_id
 * @property integer $user_id
 * @property integer $category_id
 * @property string $seoTitle
 * @property string $seoDescription
 * @property string $title
 * @property string $seoUrl
 * @property string $image
 * @property string $imageSource
 * @property string $intro
 * @property string $detail
 * @property integer $hits
 * @property integer $hide
 * @property string $nextReview
 * @property string $publishedOn
 * @property string $modifiedOn
 * @property string $postDate
 * @property integer $published
 *
 * @property PageHasPage[] $pageHasPages
 * @property PageHasPage[] $pageHasPages0
 * @property Page[] $pageId1s
 * @property Page[] $pages
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['module_id', 'user_id', 'seoUrl', 'nextReview'], 'required'],
            [['module_id', 'user_id', 'category_id', 'hits', 'hide', 'published'], 'integer'],
            [['intro', 'detail'], 'string'],
            [['nextReview', 'publishedOn', 'modifiedOn', 'postDate'], 'safe'],
            [['seoTitle'], 'string', 'max' => 90],
            [['seoDescription', 'image', 'imageSource'], 'string', 'max' => 255],
            [['title', 'seoUrl'], 'string', 'max' => 100],
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
            'module_id' => 'Module ID',
            'user_id' => 'User ID',
            'category_id' => 'Category ID',
            'seoTitle' => 'Seo Title',
            'seoDescription' => 'Seo Description',
            'title' => 'Title',
            'seoUrl' => 'Seo Url',
            'image' => 'Image',
            'imageSource' => 'Image Source',
            'intro' => 'Intro',
            'detail' => 'Detail',
            'hits' => 'Hits',
            'hide' => 'Hide',
            'nextReview' => 'Next Review',
            'publishedOn' => 'Published On',
            'modifiedOn' => 'Modified On',
            'postDate' => 'Post Date',
            'published' => 'Published',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageHasPages()
    {
        return $this->hasMany(PageHasPage::className(), ['page_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageHasPages0()
    {
        return $this->hasMany(PageHasPage::className(), ['page_id1' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageId1s()
    {
        return $this->hasMany(Page::className(), ['id' => 'page_id1'])->viaTable('page_has_page', ['page_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages()
    {
        return $this->hasMany(Page::className(), ['id' => 'page_id'])->viaTable('page_has_page', ['page_id1' => 'id']);
    }
}
