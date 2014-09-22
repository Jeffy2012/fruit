<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 *
 * @property Variety[] $varieties
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVarieties()
    {
        return $this->hasMany(Variety::className(), ['category_id' => 'id']);
    }

    static function getItems()
    {
        $categories = Category::find()->asArray()->all();
        $items = [];
        foreach ($categories as $category) {
            $items[$category['id']] = $category['name'];
        }
        return $items;
    }
}
