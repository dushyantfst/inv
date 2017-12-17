<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[IpTasks]].
 *
 * @see IpTasks
 */
class IpTasksQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return IpTasks[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IpTasks|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
