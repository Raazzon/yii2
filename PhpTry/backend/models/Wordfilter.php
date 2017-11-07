<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "wordfilter".
 *
 * @property integer $id
 * @property string $filterwords
 * @property string $description
 */
class Wordfilter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wordfilter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filterwords', 'description'], 'required'],
            [['description'], 'string'],
            [['filterwords'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filterwords' => 'Filterwords',
            'description' => 'Description',
        ];
    }
    
    public function checkfilterwords($filterword, $detail){
        
        $wordValidate = true;
        if (strlen($filterword) > 3):
            $words = explode(",", $filterword);
            $IncludedWords = array();
            foreach ($words as $word):
                if (strpos(strtolower(strip_tags($detail)), strtolower($word)) !== false) {
                    //          print_r($word); die();
                    $IncludedWords[] = $word;
                    //  print_r($IncludedWords); die();
                    $implodeWords = implode(", ", $IncludedWords);
                    Yii::$app->getSession()->setFlash("error", '<div class="alert alert-danger">The Content have <strong>Unwanted words:</strong>  <u>' . $implodeWords . '</u> Please make a proper sentences without these words.</div>');
                    $wordValidate = false;
                }
            endforeach;
        endif;
        
        if ($wordValidate === true ){
            return true;
        } else {
            return false;    
        }
    }
}
