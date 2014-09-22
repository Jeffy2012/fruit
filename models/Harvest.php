<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "harvests".
 *
 * @property string $id
 * @property string $tree_id
 * @property string $harvest_date
 * @property integer $output
 * @property integer $single_max
 * @property integer $single_min
 * @property integer $output_amount
 *
 * @property Tree $tree
 */
class Harvest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'harvests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tree_id', 'harvest_date', 'output'], 'required'],
            [['tree_id', 'output', 'single_max', 'single_min', 'output_amount'], 'integer'],
            [['harvest_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tree_id' => 'Tree ID',
            'harvest_date' => 'Harvest Date',
            'output' => 'Output',
            'single_max' => 'Single Max',
            'single_min' => 'Single Min',
            'output_amount' => 'Output Amount',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTree()
    {
        return $this->hasOne(Tree::className(), ['id' => 'tree_id']);
    }
}
