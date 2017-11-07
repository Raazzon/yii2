<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AskedQuestionsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asked-questions-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'ques_id') ?>

    <?= $form->field($model, 'ques_topic') ?>

    <?= $form->field($model, 'ques_details') ?>

    <?= $form->field($model, 'symptoms') ?>

    <?php // echo $form->field($model, 'field') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'age') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
