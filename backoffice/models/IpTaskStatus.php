<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ip_task_status".
 *
 * @property integer $task_status_id
 * @property string $task_status_name
 */
class IpTaskStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ip_task_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_status_id'], 'integer'],
            [['task_status_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'task_status_id' => Yii::t('app', 'Task Status ID'),
            'task_status_name' => Yii::t('app', 'Task Status Name'),
        ];
    }

    /**
     * @inheritdoc
     * @return IpTaskStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IpTaskStatusQuery(get_called_class());
    }
}
