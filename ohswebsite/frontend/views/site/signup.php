<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


use dosamigos\datepicker\DatePicker;

$this->title = 'Signup';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <div class="col-lg-6 col-sm-6 well">
                <?= $form->field($model, 'fullname')->textInput(["placeholder"=>"Please Enter Your Fullname"])?>            
            
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>
            
                <?= $form->field($model, 'address') ?>
                
                 <?= $form->field($model, 'date')->label('DateOfBirth')->widget(DatePicker::className(), [
        // inline too, not bad
                  'inline' => false, 
         // modify template for custom rendering
                      //  'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'dd-M-yyyy'
                        ]
                    ]);?>                  
                  </div>
            <div class="col-lg-6 col-sm-6">
                <div class="well">
                    <?= $form->field($model, 'gender')->dropDownList(['M' => 'Male', 'F' => 'Female', 'O' => 'Other']); 
                    ?>   
                <?= $form->field($model, 'password')->passwordInput() ?>
            
                
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
                    </div>
            </div>
            <?php ActiveForm::end(); ?>
      
    </div>
</div>
