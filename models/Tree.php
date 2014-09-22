<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trees".
 *
 * @property string $id
 * @property integer $group_id
 * @property string $usable
 * @property string $position
 * @property string $status
 *
 * @property Harvests[] $harvests
 * @property Groups $group
 */
class Tree extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trees';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id'], 'integer'],
            [['usable'], 'string'],
            [['position'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 20]
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
            'usable' => 'Usable',
            'position' => 'Position',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHarvests()
    {
        return $this->hasMany(Harvests::className(), ['tree_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Groups::className(), ['id' => 'group_id']);
    }
}
