<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\Company;
use backend\models\Department;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Branches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branches-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'branches_name')->textInput(['maxlength' => true]) ?>
    
            <?= $form->field($model, 'id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\backend\models\Company::find()->all(), 'id', 'company_name'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a Company ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?= $form->field($model, 'branches_address')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'company_id')->textInput() ?>
     <?= $form->field($model, 'department_id')->textInput() ?>
    
    <?= $form->field($model, 'id')->label('Company ID')->dropDownList(ArrayHelper::map(Company::find()->all(), 'id', 'company_name'),
            ['prompt'=>'Select Company']
            
            )?>
    
    <?= $form->field($model, 'id')->label('Department ID')->dropDownList(ArrayHelper::map(Department::find()->all(), 'id', 'department_name'),
            ['prompt'=>'Select Department']
            
            )?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>