<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "branches".
 *
 * @property string $create_time
 * @property string $update_time
 * @property integer $id
 * @property string $branches_name
 * @property string $branches_address
 * @property integer $company_id
 * @property integer $department_id
 *
 * @property Company $company
 * @property Department $department
 */
class Branches extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'branches';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_time', 'update_time'], 'safe'],
            [['branches_name', 'branches_address', 'company_id', 'department_id'], 'required'],
            [['company_id', 'department_id'], 'integer'],
            [['branches_name', 'branches_address'], 'string', 'max' => 45],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
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
            'branches_name' => 'Branches Name',
            'branches_address' => 'Branches Address',
            'company_id' => 'Company ID',
            'department_id' => 'Department ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }
}
