<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\User;

class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionResetPassword()
    {

    }

    public function actionBaseInfo()
    {

    }

    public function actionSendActivateEmail()
    {
        $user = Yii::$app->user->identity;
        $success = false;
        if ($user->sendActivateEmail()) {
            $success = true;
        }
        return $this->render('sendEmail', ['user' => $user, 'success' => $success]);
    }
}