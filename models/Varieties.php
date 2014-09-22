<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "varieties".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $category_id
 *
 * @property Groups[] $groups
 * @property Categories $category
 */
class Varieties extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'varieties';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'category_id'], 'required'],
            [['category_id'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['description'], 'string', 'max' => 1000],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Groups::className(), ['variety_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }
}
