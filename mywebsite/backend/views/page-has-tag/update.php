<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PageHasTag */

$this->title = 'Update Page Has Tag: ' . $model->page_id;
$this->params['breadcrumbs'][] = ['label' => 'Page Has Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->page_id, 'url' => ['view', 'page_id' => $model->page_id, 'tag_id' => $model->tag_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="page-has-tag-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
