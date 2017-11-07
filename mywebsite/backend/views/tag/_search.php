<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TagSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tag-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'seoTitle') ?>

    <?= $form->field($model, 'seoKeywords') ?>

    <?= $form->field($model, 'seoDescription') ?>

    <?= $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'seoUrl') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'detail') ?>

    <?php // echo $form->field($model, 'hits') ?>

    <?php // echo $form->field($model, 'postDate') ?>

    <?php // echo $form->field($model, 'published') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
