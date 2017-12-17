<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ip_projects".
 *
 * @property integer $project_id
 * @property integer $client_id
 * @property string $project_name
 */
class IpProjects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ip_projects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id'], 'required'],
            [['client_id'], 'integer'],
            [['project_name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'project_id' => Yii::t('app', 'Project ID'),
            'client_id' => Yii::t('app', 'Client ID'),
            'project_name' => Yii::t('app', 'Project Name'),
        ];
    }
}
