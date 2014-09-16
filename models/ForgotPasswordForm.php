<?php
namespace app\models;

use Yii;
use yii\base\Model;

class ForgotPasswordForm extends Model
{
    public $username;

    public $verifyCode;

    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim',],
            ['email', 'required'],
            ['email', 'email'],
            ['email','exist','targetClass' => '\app\models\User'],
            ['verifyCode', 'captcha'],
        ];


    }

    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'verifyCode' => '验证码'
        ];
    }
}
