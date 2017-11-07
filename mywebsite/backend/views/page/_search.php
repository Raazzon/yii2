<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'module_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'seoTitle') ?>

    <?php // echo $form->field($model, 'seoDescription') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'seoUrl') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'imageSource') ?>

    <?php // echo $form->field($model, 'intro') ?>

    <?php // echo $form->field($model, 'detail') ?>

    <?php // echo $form->field($model, 'hits') ?>

    <?php // echo $form->field($model, 'hide') ?>

    <?php // echo $form->field($model, 'nextReview') ?>

    <?php // echo $form->field($model, 'publishedOn') ?>

    <?php // echo $form->field($model, 'modifiedOn') ?>

    <?php // echo $form->field($model, 'postDate') ?>

    <?php // echo $form->field($model, 'published') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
