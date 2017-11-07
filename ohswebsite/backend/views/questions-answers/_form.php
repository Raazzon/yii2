<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use backend\models\EmployeeDetail;
use backend\models\AskedQuestions;

/* @var $this yii\web\View */
/* @var $model backend\models\QuestionsAnswers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="questions-answers-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-8 well">
    
    <?= $form->field($model, 'ques_id')->label('Question Topic')->dropDownList(ArrayHelper::map(AskedQuestions::find()->all(), 'ques_id', 'ques_topic'),
            ['prompt'=>'Select Question'] )?>

    <?= $form->field($model, 'emp_id')->label('Employee Name')->dropDownList(ArrayHelper::map(EmployeeDetail::find()->all(), 'emp_id', 'name'),
            ['prompt'=>'Select Employee'])?>

    <?= $form->field($model, 'answer')->textarea() ?>

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

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
