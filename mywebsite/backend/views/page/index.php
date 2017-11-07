<?php

use yii\helpers\Html;
use yii\grid\GridView;

use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use backend\models\Module;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Page', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
             [
    'attribute' => 'module_id',
                 'format' => 'raw',
     'value' => function ($data) {
                      if($data->user)
                         return   Html::a(Html::encode($data->module->title), ['module/view', 'id' => $data['module_id']]);
                    else
                        return   Html::encode("NOT Assigned");
                   
                },
    'filter' => Html::activeDropDownList($searchModel, 'module_id', ArrayHelper::map(Module::find()->asArray()->all(), 'id', 'title'),['class'=>'form-control','prompt' => 'Select Module']),
],
            
            [
    'attribute' => 'user_id',
                 'format' => 'raw',
     'value' => function ($data) {
                      if($data->user)
                         return   Html::a(Html::encode($data->user->fullname), ['user/view', 'id' => $data['user_id']]);
                    else
                        return   Html::encode("NOT Picked");
                   
                },
    'filter' => Html::activeDropDownList($searchModel, 'user_id', ArrayHelper::map(User::find()->asArray()->all(), 'id', 'fullname'),['class'=>'form-control','prompt' => 'Select User']),
],
           // 'id',
            //'module_id',
            //'user_id',
            //'category_id',
            //'seoTitle',
            // 'seoDescription',
             'title',
             'seoUrl',
            // 'image',
            // 'intro:ntext',
            // 'detail:ntext',
             'hits',
            // 'publishedOn',
            // 'modifiedOn',
            // 'postDate',
            // 'published',
             [
           'attribute' => 'published',
           'format' => 'raw',
          'filter' => Html::activeDropDownList($searchModel, 'published', array('1' => 'Active', '0' => 'Not Published'), ['class' => 'form-control', 'prompt' => 'All']),
                         'options' => ['style' => 'width:100px;',
                                         ],       
                             'value' => function ($data) {
                                return $data->published>0?"Published":"Not Published";
                            },],
         [
                                    'attribute' => 'publishedOn',
                                    // 'format' => 'raw',
                                   
                                    'filter' => DatePicker::widget([
                                        'model' => $searchModel,
                                        'attribute' => 'publishedOn',
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'yyyy-mm-dd',
                                        ],
                                         'type'=> DatePicker::TYPE_COMPONENT_PREPEND,
                                    ]),
                                    'options' => ['style' => 'width:150px;',
                                         ],
                                    'format' => 'html',
                                ],
            [
                                    'attribute' => 'postDate',
                                    // 'format' => 'raw',
                                   
                                    'filter' => DatePicker::widget([
                                        'model' => $searchModel,
                                        'attribute' => 'postDate',
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'yyyy-mm-dd',
                                        ],
                                         'type'=> DatePicker::TYPE_COMPONENT_PREPEND,
                                    ]),
                                    'options' => ['style' => 'width:150px;',
                                         ],
                                    'format' => 'html',
                                ],                          

            ['class' => 'yii\grid\ActionColumn', 
                'template'=>'{view}{update}'],
        ],
    ]); ?>

</div>
