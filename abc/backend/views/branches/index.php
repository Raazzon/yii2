<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BranchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Branch', ['value'=> \yii\helpers\Url::to('index.php/branches/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
    
    <?php
        Modal::begin([
                    'header'=>'<h4>Branches<h4>',
                    'id'=>'modal',
                    'size'=>'modal-lg',
                    ]);
        echo "<div id='modalContent'></div>";

         Modal::end();
     ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'create_time',
            'update_time',
            'id',
            'branches_name',
            'branches_address',
            // 'company_id',
            // 'department_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
