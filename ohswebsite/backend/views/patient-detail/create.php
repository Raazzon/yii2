<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PatientDetail */

$this->title = 'Create Patient Detail';
$this->params['breadcrumbs'][] = ['label' => 'Patient Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
