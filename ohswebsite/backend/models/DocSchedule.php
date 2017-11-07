<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "doc_schedule".
 *
 * @property integer $id
 * @property integer $emp_id
 * @property string $day
 * @property string $time
 */
class DocSchedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doc_schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_id', 'day', 'time'], 'required'],
            [['emp_id'], 'integer'],
            [['day'], 'string', 'max' => 10],
            [['time'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'emp_id' => 'Emp ID',
            'day' => 'Day',
            'time' => 'Time',
        ];
    }
}
