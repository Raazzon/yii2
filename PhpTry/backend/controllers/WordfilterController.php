<?php

namespace backend\controllers;

use Yii;
use backend\models\Wordfilter;
use backend\models\WordfilterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WordfilterController implements the CRUD actions for Wordfilter model.
 */
class WordfilterController extends Controller
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
     * Lists all Wordfilter models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WordfilterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Wordfilter model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Wordfilter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Wordfilter();
       
        if ($model->load(Yii::$app->request->post())) {
               $wordValidate = true;
                //set validate false if a word missing in the page
                if (strlen($model->filterwords) > 3):
                    $words = explode(",", $model->filterwords);
                    $IncludedWords = array();
                    foreach ($words as $word):
                            
                        if (strpos(strtolower(strip_tags($model->description)), strtolower($word)) !== false) {
                  //          print_r($word); die();
                            $IncludedWords[] = $word;
                      //  print_r($IncludedWords); die();
                       $implodeWords = implode(", ", $IncludedWords);
             Yii::$app->getSession()->setFlash("error", '<div class="alert alert-danger">The Content have <strong>Unwanted words:</strong>  <u>' . $implodeWords . '</u> Please make a proper sentences without these words.</div>');
                            $wordValidate = false;
                        }
                    endforeach;
                endif;
                
                // If false
              if ($wordValidate !== false) {
                    $validate = true;
                 $model->save();   
              }
            //$model->save();
            
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Wordfilter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $wordValidate = true;
                //set validate false if a word missing in the page
                if (strlen($model->filterwords) > 3):
                    $words = explode(",", $model->filterwords);
                    $IncludedWords = array();
                    foreach ($words as $word):
                            
                        if (strpos(strtolower(strip_tags($model->description)), strtolower($word)) !== false) {
                  //          print_r($word); die();
                            $IncludedWords[] = $word;
                      //  print_r($IncludedWords); die();
                       $implodeWords = implode(", ", $IncludedWords);
             Yii::$app->getSession()->setFlash("error", '<div class="alert alert-danger">The Content have <strong>Unwanted words:</strong>  <u>' . $implodeWords . '</u> Please make a proper sentences without these words.</div>');
                            $wordValidate = false;
                        }
                    endforeach;
                endif;
                
                // If false
              if ($wordValidate !== false) {
                    $validate = true;
                 $model->save();   
              }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Wordfilter model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Wordfilter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Wordfilter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Wordfilter::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
