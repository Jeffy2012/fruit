<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if (Yii::$app->session['loginError'] >= 4) {
            $model->scenario = 'safe';
        } else {
            $model->scenario = 'normal';
        }
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //重置 loginError
            unset(Yii::$app->session['loginError']);
            return $this->goBack();
        } else {
            //错误次数 loginError
            if ($model->hasErrors()) {
                if (!Yii::$app->session['loginError']) {
                    Yii::$app->session['loginError'] = 1;
                } else {
                    Yii::$app->session['loginError'] += 1;
                }
            }

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionRegister()
    {
        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            return $this->goHome();
        } else {
            return $this->render('register', [
                'model' => $model,
            ]);
        }
    }

    public function actionActivation($id, $key)
    {
        $user = User::findOne($id);
        if ($key == $user->auth_key && $user->activate('email')) {
            return $this->goHome();
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
