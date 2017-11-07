<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PatientDetail */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Patient Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->patient_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->patient_id], [
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
            'patient_id',
            'name',
            'dob',
            'email:email',
            'sex',
            'blood',
            'phone',
            'address',
        ],
    ]) ?>

</div>
