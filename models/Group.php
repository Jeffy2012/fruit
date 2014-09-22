<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "groups".
 *
 * @property integer $id
 * @property integer $orchard_id
 * @property integer $variety_id
 * @property string $planting_date
 *
 * @property Estimate[] $estimates
 * @property Orchard $orchard
 * @property Variety $variety
 * @property Tree[] $trees
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orchard_id', 'variety_id', 'planting_date'], 'required'],
            [['orchard_id', 'variety_id'], 'integer'],
            [['planting_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orchard_id' => 'Orchard ID',
            'variety_id' => 'Variety ID',
            'planting_date' => 'Planting Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstimates()
    {
        return $this->hasMany(Estimate::className(), ['group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrchard()
    {
        return $this->hasOne(Orchard::className(), ['id' => 'orchard_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVariety()
    {
        return $this->hasOne(Variety::className(), ['id' => 'variety_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrees()
    {
        return $this->hasMany(Tree::className(), ['group_id' => 'id']);
    }
}
