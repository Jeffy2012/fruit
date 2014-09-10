<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\validators\EmailValidator;
use yii\validators\RegularExpressionValidator;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $verifyCode;
    public $rememberMe = true;

    private $_user = false;

    public function rules()
    {
        return [
            [['username'], 'filter', 'filter' => 'trim',],
            [['username'], 'required'],

            [['password'], 'required'],
            [['password'], 'validatePassword'],

            [['rememberMe'], 'boolean'],
            [['verifyCode'], 'captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => '账户',
            'password' => '密码',
            'rememberMe' => '记住我',
            'verifyCode' => '验证码'
        ];
    }

    public function scenarios()
    {
        return [
            'normal' => ['username', 'password'],
            'safe' => ['username', 'password', 'verifyCode'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->user, $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * @return bool|User
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $emailValidator = new EmailValidator();
            $phoneValidator = new RegularExpressionValidator(['pattern' => '/^1\d{10}$/i']);
            $key = 'nickname';
            if ($emailValidator->validate($this->username)) {
                $key = 'email';
            }
            if ($phoneValidator->validate($this->username)) {
                $key = 'phone_number';
            }
            $condition = array();
            $condition[$key] = $this->username;
            $this->_user = User::findOne($condition);
        }
        return $this->_user;
    }
}