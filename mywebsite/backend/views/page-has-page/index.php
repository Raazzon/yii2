<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PageHasPageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Page Has Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-has-page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Page Has Page', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'page_id',
            'page_id1',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
