<?php

namespace backend\controllers;

use Yii;
use backend\models\PageHasTag;
use backend\models\PageHasTagSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PageHasTagController implements the CRUD actions for PageHasTag model.
 */
class PageHasTagController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PageHasTag models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PageHasTagSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PageHasTag model.
     * @param integer $page_id
     * @param integer $tag_id
     * @return mixed
     */
    public function actionView($page_id, $tag_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($page_id, $tag_id),
        ]);
    }

    /**
     * Creates a new PageHasTag model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PageHasTag();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'page_id' => $model->page_id, 'tag_id' => $model->tag_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PageHasTag model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $page_id
     * @param integer $tag_id
     * @return mixed
     */
    public function actionUpdate($page_id, $tag_id)
    {
        $model = $this->findModel($page_id, $tag_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'page_id' => $model->page_id, 'tag_id' => $model->tag_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PageHasTag model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $page_id
     * @param integer $tag_id
     * @return mixed
     */
    public function actionDelete($page_id, $tag_id)
    {
        $this->findModel($page_id, $tag_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PageHasTag model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $page_id
     * @param integer $tag_id
     * @return PageHasTag the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($page_id, $tag_id)
    {
        if (($model = PageHasTag::findOne(['page_id' => $page_id, 'tag_id' => $tag_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
