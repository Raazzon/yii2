<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PageHasTag */

$this->title = 'Create Page Has Tag';
$this->params['breadcrumbs'][] = ['label' => 'Page Has Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-has-tag-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
