<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "asked_questions".
 *
 * @property integer $user_id
 * @property integer $ques_id
 * @property string $ques_topic
 * @property string $ques_details
 * @property string $symptoms
 * @property string $field
 * @property string $sex
 * @property string $date
 * @property integer $age
 */
class AskedQuestions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asked_questions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'ques_topic', 'ques_details', 'symptoms', 'field', 'sex', 'date', 'age'], 'required'],
            [['user_id', 'age'], 'integer'],
            [['sex'], 'string'],
            [['ques_topic'], 'string', 'max' => 50],
            [['ques_details'], 'string', 'max' => 400],
            [['symptoms'], 'string', 'max' => 100],
            [['field', 'date'], 'string', 'max' => 33],
            [['ques_topic'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'ques_id' => 'Ques ID',
            'ques_topic' => 'Ques Topic',
            'ques_details' => 'Ques Details',
            'symptoms' => 'Symptoms',
            'field' => 'Field',
            'sex' => 'Gender',
            'date' => 'Date',
            'age' => 'Age',
        ];
    }
}
