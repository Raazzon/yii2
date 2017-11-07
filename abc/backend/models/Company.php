<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property string $create_time
 * @property string $update_time
 * @property integer $id
 * @property string $company_name
 * @property string $company_address
 * @property string $company_email
 * @property string $company_start_date
 *
 * @property Branches[] $branches
 * @property Department[] $departments
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    //Upload file into server
    public $file;
    
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_time', 'update_time', 'company_start_date'], 'safe'],
            [['company_name', 'company_address', 'company_email', 'company_start_date'], 'required'],
            [['company_name','logo', 'company_address', 'company_email'], 'string', 'max' => 45],
            [['file'],'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'id' => 'ID',
            'company_name' => 'Company Name',
            'company_address' => 'Company Address',
            'company_email' => 'Company Email',
            'company_start_date' => 'Company Start Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranches()
    {
        return $this->hasMany(Branches::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::className(), ['company_id' => 'id']);
    }
}
