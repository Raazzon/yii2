<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $model backend\models\AskedQuestions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asked-questions-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'user_id')->label('User Name')->dropDownList(ArrayHelper::map(\common\models\User::find()->all(), 'id', 'fullname'),
            ['prompt'=>'Select Username']
            
            )?>

    <?= $form->field($model, 'ques_topic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ques_details')->textarea() ?>

    <?= $form->field($model, 'symptoms')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'field')->textInput(['maxlength' => true]) ?>
   
    <?= $form->field($model, 'sex')->label()->dropDownList(['M' => 'Male', 'F' => 'Female', 'O' => 'Other']); 
                    ?>   

     <?= $form->field($model, 'date')->widget(
    DatePicker::className(), [
        // inline too, not bad
       //  'inline' => true, 
         // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
        ]);?>

    <?= $form->field($model, 'age')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

