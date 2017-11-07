<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AskedQuestions */

$this->title = 'Update Asked Questions: ' . $model->ques_id;
$this->params['breadcrumbs'][] = ['label' => 'Asked Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ques_id, 'url' => ['view', 'id' => $model->ques_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asked-questions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
