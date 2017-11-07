<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use backend\models\EmployeeDetail;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\DocSchedule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doc-schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'emp_id')->label('Employee Name')->dropDownList(ArrayHelper::map(EmployeeDetail::find()->all(), 'emp_id', 'name'),
            ['prompt'=>'Select Employee']
            
            )?>


    <?= $form->field($model, 'day')->label()->dropDownList(['S' => 'Sunday', 'M' => 'Monday', 'T' => 'Tuesday','W'=>'Wednesday','Th'=>'Thrusday','F'=>'Friday','Sat'=>'Saturday']); 
                    ?>  

    <?= $form->field($model, 'time')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
