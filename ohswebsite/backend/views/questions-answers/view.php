<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\QuestionsAnswers */

$this->title = $model->ans_id;
$this->params['breadcrumbs'][] = ['label' => 'Questions Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questions-answers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ans_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ans_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ans_id',
            'ques_id',
            'emp_id',
            'answer',
            'date',
        ],
    ]) ?>

</div>
