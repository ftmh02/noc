<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\User;
use dektrium\user\controllers\SecurityController;

class SiteController extends SecurityController
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
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
    * Displays the login page.
    *
    * @return string|Response
    */
   public function actionLogin()
   {
       die();
       if (!\Yii::$app->user->isGuest) {
           $this->goHome();
       }

       /** @var LoginForm $model */
       $model = \Yii::createObject(LoginForm::className());
       $event = $this->getFormEvent($model);

       $this->performAjaxValidation($model);

       $this->trigger(self::EVENT_BEFORE_LOGIN, $event);

       if ($model->load(\Yii::$app->getRequest()->post()) && $model->login()) {
           $this->trigger(self::EVENT_AFTER_LOGIN, $event);
           if ($user->is-admin == 1) {
                return $this->redirect("/site/fgdfgdfgdfgdfgdfgdfgdfgdf");
           } else {
            return $this->redirect("/site/quest");
           }
       }

       return $this->render('login', [
           'model'  => $model,
           'module' => $this->module,
       ]);
   }
}
