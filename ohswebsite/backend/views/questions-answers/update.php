<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\QuestionsAnswers */

$this->title = 'Update Questions Answers: ' . $model->ans_id;
$this->params['breadcrumbs'][] = ['label' => 'Questions Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ans_id, 'url' => ['view', 'id' => $model->ans_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="questions-answers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
