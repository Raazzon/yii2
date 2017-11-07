<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PageHasPage */

$this->title = 'Update Page Has Page: ' . $model->page_id;
$this->params['breadcrumbs'][] = ['label' => 'Page Has Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->page_id, 'url' => ['view', 'page_id' => $model->page_id, 'page_id1' => $model->page_id1]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="page-has-page-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
