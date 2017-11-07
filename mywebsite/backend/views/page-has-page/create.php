<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PageHasPage */

$this->title = 'Create Page Has Page';
$this->params['breadcrumbs'][] = ['label' => 'Page Has Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-has-page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
