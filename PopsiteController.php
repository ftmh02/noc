<?php

namespace app\controllers;

use Yii;
use app\models\Popsite;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\TypeOfService;
use app\models\ServicePopsite;
use app\models\PopsiteSearch;

/**
 * PopsiteController implements the CRUD actions for Popsite model.
 */
class PopsiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            if (!Yii::$app->user->identity->isAdmin == 1) {
                                Yii::$app->session->setFlash('message', "Passwords don't match!");
                                return $this->redirect(['index']);                           
                            } else 
                            return true;
                         },
                    ],
                    [
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            if (!Yii::$app->user->identity->isAdmin == 1) {
                                Yii::$app->session->setFlash('message', "Passwords don't match!");
                                return $this->redirect(['index']);                            
                            } else 
                            return true;
                         },
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            if (!Yii::$app->user->identity->isAdmin == 1) {
                                Yii::$app->session->setFlash('message', "Passwords don't match!");
                                return $this->redirect(['index']);                            
                            } else 
                            return true;
                         },
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            if (!Yii::$app->user->identity->isAdmin == 1) {
                                Yii::$app->session->setFlash('message', "Passwords don't match!");
                                return $this->redirect(['index']);                            
                            } else 
                            return true;
                         },
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Lists all Popsite models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchResult=new PopsiteSearch();
        $dataproviser = $searchResult->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchResult' => $searchResult,
        ]);
    }

    /**
     * Displays a single Popsite model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Popsite model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Popsite();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $servicePopsite = new ServicePopsite();
                $servicePopsite->popsite_id=$model->id;
                $servicePopsite->is_used=0;
                $servicePopsite->service_id='1';
                $servicePopsite->save();
                $servicePopsite = new ServicePopsite();
                $servicePopsite->popsite_id=$model->id;
                $servicePopsite->service_id=2;
                $servicePopsite->save();
                $servicePopsite = new ServicePopsite();
                $servicePopsite->popsite_id=$model->id;
                $servicePopsite->service_id=3;
                $servicePopsite->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
            Throw new \Exception("u can not save this item");
        }
        
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Popsite model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            Throw new \Exception("u can not save this item");
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Popsite model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Popsite model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Popsite the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Popsite::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
