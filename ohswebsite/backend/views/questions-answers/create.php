<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\QuestionsAnswers */

$this->title = 'Create Questions Answers';
$this->params['breadcrumbs'][] = ['label' => 'Questions Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questions-answers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
