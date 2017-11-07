<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AskedQuestions */

$this->title = 'Create Asked Questions';
$this->params['breadcrumbs'][] = ['label' => 'Asked Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asked-questions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
