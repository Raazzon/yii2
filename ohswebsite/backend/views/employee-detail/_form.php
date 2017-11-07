<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use borales\extensions\phoneInput\PhoneInput;

/* @var $this yii\web\View */
/* @var $model backend\models\EmployeeDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'dob')->widget(
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
    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

   
    <?=$form->field($model, 'phone')->widget(PhoneInput::className(), [
    'jsOptions' => [
        'preferredCountries' => ['np', 'pl', 'ua'],
    ]
    ]);?>
    

    <?= $form->field($model, 'field')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'history')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'sex')->label()->dropDownList(['M' => 'Male', 'F' => 'Female', 'O' => 'Other']); 
                    ?>   

    <?= $form->field($model, 'images')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
