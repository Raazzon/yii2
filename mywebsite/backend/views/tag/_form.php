<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tag */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tag-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-lg-8 col-sm-8 well">

        <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>
        <?= $form->field($model, 'seoUrl')->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'image')->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'hits')->textInput() ?>

    </div>
    <div class="col-lg-4 col-sm-4">
        <div class=" well">
            <?= $form->field($model, 'seoTitle')->textInput(['maxlength' => 100]) ?>

            <?= $form->field($model, 'seoKeywords')->textInput(['maxlength' => 100]) ?>

            <?= $form->field($model, 'seoDescription')->textInput(['maxlength' => 255]) ?>

        </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
