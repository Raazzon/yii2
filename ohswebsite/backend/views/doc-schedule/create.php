<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DocSchedule */

$this->title = 'Create Doc Schedule';
$this->params['breadcrumbs'][] = ['label' => 'Doc Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doc-schedule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
