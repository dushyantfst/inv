<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%ip_tasks}}".
 *
 * @property integer $task_id
 * @property integer $project_id
 * @property string $task_name
 * @property string $task_description
 * @property string $task_price
 * @property string $task_finish_date
 * @property integer $task_status
 * @property integer $tax_rate_id
 * @property string $task_start_date
 */
class IpTasks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ip_tasks}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'task_description', 'task_finish_date', 'task_status', 'tax_rate_id'], 'required'],
            [['project_id', 'task_status', 'tax_rate_id'], 'integer'],
            [['task_name', 'task_description'], 'string'],
            [['task_price'], 'number'],
            [['task_finish_date', 'task_start_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'task_id' => Yii::t('app', 'Task ID'),
            'project_id' => Yii::t('app', 'Project ID'),
            'task_name' => Yii::t('app', 'Task Name'),
            'task_description' => Yii::t('app', 'Task Description'),
            'task_price' => Yii::t('app', 'Task Price'),
            'task_finish_date' => Yii::t('app', 'Task Finish Date'),
            'task_status' => Yii::t('app', 'Task Status'),
            'tax_rate_id' => Yii::t('app', 'Tax Rate ID'),
            'task_start_date' => Yii::t('app', 'Task Start Date'),
        ];
    }

    /**
     * @inheritdoc
     * @return IpTasksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IpTasksQuery(get_called_class());
    }
}
