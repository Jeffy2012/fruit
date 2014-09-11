<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\db\Expression;

/**
 * This is the model class for table "user".
 *
 * @property string $user_id
 * @property string $email
 * @property string $phone_number
 * @property string $nickname
 * @property string $gender
 * @property string $password
 * @property string $activated
 * @property string $created_at
 * @property string $updated_at
 * @property string $activated_at
 * @property string $auth_key
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'created_at', 'auth_key'], 'required'],
            [['gender', 'activated'], 'string'],
            [['created_at', 'updated_at', 'activated_at'], 'safe'],
            [['email'], 'string', 'max' => 100],
            [['phone_number'], 'string', 'max' => 11],
            [['nickname'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 64],
            [['auth_key'], 'string', 'max' => 32],
            [['auth_key'], 'unique'],
            [['email'], 'unique'],
            [['phone_number'], 'unique'],
            [['nickname'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'nickname' => 'Nickname',
            'gender' => 'Gender',
            'password' => 'Password',
            'activated' => 'Activated',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'activated_at' => 'Activated At',
            'auth_key' => 'Auth Key',
        ];
    }

    public function scenarios()
    {
        return [
            'register' => ['email', 'password'],
            'activate' => ['activated']
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->user_id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authkey === $authKey;
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);;
                $this->auth_key = Yii::$app->getSecurity()->generateRandomString();
            }
            return true;
        } else {
            return false;
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if ($insert) {
            $this->sendActivateEmail();
        }
    }


    public function activate($type)
    {
        $this->scenario = 'activate';
        if ($type == 'email') {
            $this->activated = 'E';
            $this->touch('activated_at');
            $this->save();
            return $this;
        }
        return false;
    }

    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public function sendActivateEmail()
    {
        return Yii::$app->mailer->compose('activation', ['user' => $this])
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setTo($this->email)
            ->setSubject('系统邮件,请勿回复')
            ->send();
    }
}