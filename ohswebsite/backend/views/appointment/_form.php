<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


use yii\helpers\ArrayHelper;
use backend\models\EmployeeDetail;
use backend\models\PatientDetail;
use kartik\time\TimePicker;
use dosamigos\datepicker\DatePicker;
use kartik\file\FileInput;

?>

<div class="appointment-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data',
        'enableAjaxValidation' => true,
        'validationUrl'=>'validate']]
        ); ?>
    
     <?= $form->field($model, 'emp_id')->label('Employee Name')->dropDownList(ArrayHelper::map(EmployeeDetail::find()->all(), 'emp_id', 'name'),
            ['prompt'=>'Select Employee'] )?>

     <?= $form->field($model, 'patient_id')->label('Patient Name')->dropDownList(ArrayHelper::map(PatientDetail::find()->all(), 'patient_id', 'name'),
            ['prompt'=>'Select Patient'])?>
     <?= $form->field($model, 'time')->widget(TimePicker::classname(), []);?>
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
    
    
     <?= $form->field($model, 'payment')->textInput(['maxlength' => true]) ?>       
    
     <?= $form->field($model, 'file')->widget(FileInput::classname(), [
    'options' => ['accept' => 'file/*','image/*'],]);?>
  
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
