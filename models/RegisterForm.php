<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $email;
    public $password;
    public $passwordRepeat;
    public $verifyCode;

    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim',],
            ['email', 'required'],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.',],
            ['email', 'email'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            [['passwordRepeat'], 'compare', 'compareAttribute' => 'password'],
            [['verifyCode'], 'captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'E-mail',
            'password' => '密码',
            'passwordRepeat' => '重复密码',
            'verifyCode' => '验证码'
        ];
    }

    /**
     * @return User|null
     */
    public function register()
    {
        if ($this->validate()) {
            $user = new User();
            $user->scenario = 'register';
            $user->email = $this->email;
            $user->password = $this->password;
            if ($user->save()) {
                Yii::$app->user->login($user, 0);
                return $user;
            } else {
                return null;
            }
        }
        return null;
    }
}