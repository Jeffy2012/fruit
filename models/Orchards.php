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
 * @property Groups[] $groups
 * @property Users $user
 */
class Orchards extends \yii\db\ActiveRecord
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
            'orchard_name' => 'Orchard Name',
            'description' => 'Description',
            'user_id' => 'User ID',
            'state' => 'State',
            'province' => 'Province',
            'city' => 'City',
            'district' => 'District',
            'street' => 'Street',
            'postal_code' => 'Postal Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Groups::className(), ['orchard_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
