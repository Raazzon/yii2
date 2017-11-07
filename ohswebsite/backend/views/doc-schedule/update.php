<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DocSchedule */

$this->title = 'Update Doc Schedule: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Doc Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="doc-schedule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
