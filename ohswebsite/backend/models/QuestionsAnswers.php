<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "questions_answers".
 *
 * @property integer $ans_id
 * @property integer $ques_id
 * @property integer $emp_id
 * @property string $answer
 * @property string $date
 */
class QuestionsAnswers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'questions_answers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ques_id', 'emp_id', 'answer', 'date'], 'required'],
            [['ques_id', 'emp_id'], 'integer'],
            [['answer'], 'string', 'max' => 1000],
            [['date'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ans_id' => 'Ans ID',
            'ques_id' => 'Ques ID',
            'emp_id' => 'Emp ID',
            'answer' => 'Answer',
            'date' => 'Date',
        ];
    }
}
