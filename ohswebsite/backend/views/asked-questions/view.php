<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AskedQuestions */

$this->title = $model->ques_id;
$this->params['breadcrumbs'][] = ['label' => 'Asked Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asked-questions-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ques_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ques_id], [
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
            'user_id',
            'ques_id',
            'ques_topic',
            'ques_details',
            'symptoms',
            'field',
            'sex:ntext',
            'date',
            'age',
        ],
    ]) ?>

</div>
