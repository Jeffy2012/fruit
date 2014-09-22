<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orchards".
 *
 * @property integer $id
 * @property string $orchard_name
 * @property string $description
 * @property string $user_id
 * @property string $state
 * @property string $province
 * @property string $city
 * @property string $district
 * @property string $street
 * @property string $postal_code
 *
 * @property Group[] $groups
 * @property User $user
 */
class Orchard extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orchards';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'state', 'province', 'city', 'district', 'street'], 'required'],
            [['user_id'], 'integer'],
            [['orchard_name'], 'string', 'max' => 40],
            [['description'], 'string', 'max' => 1000],
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
            'orchard_name' => '果园名称',
            'description' => '果园描述',
            'user_id' => 'User ID',
            'state' => '国家',
            'province' => '省份',
            'city' => '市',
            'district' => '区/县',
            'street' => '具体地址',
            'postal_code' => '邮政编码',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['orchard_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
