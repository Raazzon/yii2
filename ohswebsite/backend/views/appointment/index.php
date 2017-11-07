<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Appointments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Appointment', ['value'=> \yii\helpers\Url::to(['appointment/create']),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
    
    
    <?php
    //Popup Window
            Modal::begin([
                'id'=>'modal',
                
            ]);
           //$myModel = new \backend\models\Appointment;
            //echo $this->render('create', ['model' => $myModel]);
            
            echo "<div id='modalContent'></div>";           
            
            Modal::end();
        ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'app_id',
            'emp_id',
            'patient_id',
            'time',
            'date',
            // 'payment',
            // 'report',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
