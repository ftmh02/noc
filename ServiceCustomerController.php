<?php

namespace app\controllers;

use Yii;
use app\models\ServiceCustomer;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\TypeOfService;
use app\models\User;
use app\models\Popsite;
use app\models\ServicePopsite;
use yii\helpers\ArrayHelper;

/**
 * ServiceCustomerController implements the CRUD actions for ServiceCustomer model.
 */
class ServiceCustomerController extends Controller
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
                                //$this->render('index',  array('model' => $errores));
                            }
                            else 
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
                            }
                            else 
                            return true;
                         },
                    ],
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            if (!Yii::$app->user->identity->isAdmin == 1) {
                                Yii::$app->session->setFlash('message', "Passwords don't match!");
                                return $this->redirect(['index']);                            }
                            else 
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
                                return $this->redirect(['index']);                            }
                            else 
                            return true;
                         },
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
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
     * Lists all ServiceCustomer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ServiceCustomer::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ServiceCustomer model.
      * @return mixed
    * @param integer $id
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ServiceCustomer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ServiceCustomer();
        $popsiteService = ServicePopsite::find()
            ->where(['is_used' => 0])
            ->all();

        // foreach($popsiteService as $rows){
        //     $service = TypeOfService::find()->where(['id' => $rows->service_id])->one();
        //     array_push($resultRow, $popsite, '.', $service);
        // }
        $user = User::find()->all();

        $popsiteServiceList = [];
        $listUsers = [];
        
        $popsiteServiceList = ArrayHelper::map($popsiteService, 'popsite_id', function($model) {
            $serviceName = null;
            $popsiteName = null;
            if (isset($model->service->name)) {
                $serviceName = $model->service->name;
            }
            if (isset($model->popsite->name)) {
                $popsiteName = $model->popsite->name;
            }
            return $serviceName . " " . $popsiteName;
        });
        
        $listUsers = ArrayHelper::map($user, 'id', 'username');
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $popsite = $model->ServicePopsite;
            $popsite->is_used = 1 ;
            $popsite->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        // if($popsite == null)
		// 	throw new CHttpException(404,'The requested page does not exist.');
        
        return $this->render('create', array(
            'model' => $model,
            'popsiteServiceList' => $popsiteServiceList,
            'list_users' => $listUsers,
        ));
    }

    /**
     * Updates an existing ServiceCustomer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ServiceCustomer model.
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
     * Finds the ServiceCustomer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ServiceCustomer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ServiceCustomer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
