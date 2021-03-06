<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PatientDetail */

$this->title = 'Update Patient Detail: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Patient Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->patient_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="patient-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
