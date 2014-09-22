<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estimates".
 *
 * @property string $id
 * @property integer $group_id
 * @property string $estimate_date
 * @property integer $output_max
 * @property integer $output_min
 * @property integer $single_max
 * @property integer $single_min
 * @property integer $output_amount
 * @property string $remark
 * @property integer $pick_times
 *
 * @property Groups $group
 */
class Estimate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estimates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'estimate_date', 'output_max', 'output_min', 'pick_times'], 'required'],
            [['group_id', 'output_max', 'output_min', 'single_max', 'single_min', 'output_amount', 'pick_times'], 'integer'],
            [['estimate_date'], 'safe'],
            [['remark'], 'string', 'max' => 400]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Group ID',
            'estimate_date' => 'Estimate Date',
            'output_max' => 'Output Max',
            'output_min' => 'Output Min',
            'single_max' => 'Single Max',
            'single_min' => 'Single Min',
            'output_amount' => 'Output Amount',
            'remark' => 'Remark',
            'pick_times' => 'Pick Times',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Groups::className(), ['id' => 'group_id']);
    }
}
