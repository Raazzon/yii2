<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Appointment */

$this->title = 'Update Appointment: ' . $model->app_id;
$this->params['breadcrumbs'][] = ['label' => 'Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->app_id, 'url' => ['view', 'id' => $model->app_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="appointment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
