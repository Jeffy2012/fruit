<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "receivers".
 *
 * @property string $id
 * @property string $user_id
 * @property string $receiver_name
 * @property string $phone_number
 * @property string $state
 * @property string $province
 * @property string $city
 * @property string $district
 * @property string $street
 * @property string $postal_code
 * @property string $is_default
 *
 * @property Users $user
 */
class Receivers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'receivers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'state', 'province', 'city', 'district', 'street'], 'required'],
            [['user_id'], 'integer'],
            [['is_default'], 'string'],
            [['receiver_name'], 'string', 'max' => 40],
            [['phone_number'], 'string', 'max' => 11],
            [['state', 'province', 'city', 'district'], 'string', 'max' => 20],
            [['street'], 'string', 'max' => 100],
            [['postal_code'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'receiver_name' => 'Receiver Name',
            'phone_number' => 'Phone Number',
            'state' => 'State',
            'province' => 'Province',
            'city' => 'City',
            'district' => 'District',
            'street' => 'Street',
            'postal_code' => 'Postal Code',
            'is_default' => 'Is Default',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
