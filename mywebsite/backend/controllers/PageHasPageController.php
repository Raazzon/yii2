<?php

namespace backend\controllers;

use Yii;
use backend\models\PageHasPage;
use backend\models\PageHasPageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PageHasPageController implements the CRUD actions for PageHasPage model.
 */
class PageHasPageController extends Controller
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
     * Lists all PageHasPage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PageHasPageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PageHasPage model.
     * @param integer $page_id
     * @param integer $page_id1
     * @return mixed
     */
    public function actionView($page_id, $page_id1)
    {
        return $this->render('view', [
            'model' => $this->findModel($page_id, $page_id1),
        ]);
    }

    /**
     * Creates a new PageHasPage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PageHasPage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'page_id' => $model->page_id, 'page_id1' => $model->page_id1]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PageHasPage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $page_id
     * @param integer $page_id1
     * @return mixed
     */
    public function actionUpdate($page_id, $page_id1)
    {
        $model = $this->findModel($page_id, $page_id1);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'page_id' => $model->page_id, 'page_id1' => $model->page_id1]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PageHasPage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $page_id
     * @param integer $page_id1
     * @return mixed
     */
    public function actionDelete($page_id, $page_id1)
    {
        $this->findModel($page_id, $page_id1)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PageHasPage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $page_id
     * @param integer $page_id1
     * @return PageHasPage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($page_id, $page_id1)
    {
        if (($model = PageHasPage::findOne(['page_id' => $page_id, 'page_id1' => $page_id1])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
