<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DocScheduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Doc Schedules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doc-schedule-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Doc Schedule', ['value'=> \yii\helpers\Url::to(['doc-schedule/create']),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
    
    
    <?php
    Modal::begin([
       'id'=>'modal' 
    ]);
    echo "<div id='modalContent'></div>";
    
    Modal::end();
    ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'emp_id',
            'day',
            'time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
