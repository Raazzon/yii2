<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "employee_detail".
 *
 * @property string $emp_id
 * @property string $name
 * @property string $dob
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $field
 * @property string $history
 * @property string $sex
 * @property string $images
 */
class EmployeeDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dob'], 'safe'],
            [['phone'], 'integer'],
            [['sex'], 'required'],
            [['name', 'email'], 'string', 'max' => 40],
            [['address'], 'string', 'max' => 50],
            [['field', 'history', 'images'], 'string', 'max' => 32],
            [['sex'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'emp_id' => 'Emp ID',
            'name' => 'Fullname',
            'dob' => 'Dob',
            'address' => 'Address',
            'email' => 'Email',
            'phone' => 'Phone',
            'field' => 'Field',
            'history' => 'History',
            'sex' => 'Gender',
            'images' => 'Images',
        ];
    }
}
