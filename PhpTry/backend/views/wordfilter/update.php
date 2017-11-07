<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Wordfilter */

$this->title = 'Update Wordfilter: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Wordfilters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wordfilter-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
