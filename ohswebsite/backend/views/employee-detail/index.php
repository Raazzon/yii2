<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmployeeDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employee Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Employee Detail', ['value'=> \yii\helpers\Url::to(['employee-detail/create']),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
    
    <?php
    Modal::begin([
        'id'=>'modal'
    ]);
    echo "<div id ='modalContent'></div>";
    Modal::end();
    
    
    ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'emp_id',
            'name',
            'dob',
            'address',
            'email:email',
            // 'phone',
            // 'field',
            // 'history',
            // 'sex',
            // 'images',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
