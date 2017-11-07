<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AskedQuestionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asked Questions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asked-questions-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Asked Questions', ['value'=> \yii\helpers\Url::to(['asked-questions/create']), 'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
    
    <?php
    Modal::begin([
                      'id'=>'modal',

    ]);
    echo "<div id='modalContent'></div>";
    
    Modal::end();
    ?>
    
    <?php Pjax::begin(['id'=>'askedquestiongrid'])
    
    ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'ques_id',
            'ques_topic',
            'ques_details',
            'symptoms',
            // 'field',
            // 'sex:ntext',
            // 'date',
            // 'age',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end()?>
</div>
