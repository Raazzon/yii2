<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "appointment".
 *
 * @property string $app_id
 * @property integer $emp_id
 * @property integer $patient_id
 * @property string $time
 * @property string $date
 * @property integer $payment
 * @property string $report
 */
class Appointment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'appointment';
    }

    /**
     * @inheritdoc
     */
    
    public function rules()
            
    {
        return [
            [['emp_id', 'patient_id', 'time', 'date'], 'required'],
            [['emp_id', 'patient_id', 'payment'], 'integer'],
            [['date'], 'safe',],
            [['time'], 'string', 'max' => 15],
            [['report'], 'string'],
            [['file'],'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'app_id' => 'App ID',
            'emp_id' => 'Emp ID',
            'patient_id' => 'Patient ID',
            'time' => 'Time',
            'date' => 'Date',
            'payment' => 'Payment',
            'file' => 'Report',
        ];
    }
    public function getEmployee(){
        return $this->hasOne(EmployeeDetail:: className(),['emp_id'=>'emp_id']);
    }
   
}
