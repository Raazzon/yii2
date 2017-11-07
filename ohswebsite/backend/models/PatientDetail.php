<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "patient_detail".
 *
 * @property integer $patient_id
 * @property string $name
 * @property string $dob
 * @property string $email
 * @property string $sex
 * @property string $blood
 * @property string $phone
 * @property string $address
 */
class PatientDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dob'], 'safe'],
            [['blood'], 'required'],
            [['name', 'email', 'address'], 'string', 'max' => 50],
            [['sex'], 'string', 'max' => 1],
            [['blood'], 'string', 'max' => 3],
            [['phone'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'patient_id' => 'Patient ID',
            'name' => 'Fullname',
            'dob' => 'Dob',
            'email' => 'Email',
            'sex' => 'Gender',
            'blood' => 'Blood Group',
            'phone' => 'Phone',
            'address' => 'Address',
        ];
    }
}
