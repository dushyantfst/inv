<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[IpProjects]].
 *
 * @see IpProjects
 */
class IpProjectsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return IpProjects[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IpProjects|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
