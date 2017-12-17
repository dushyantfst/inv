<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[IpVendor]].
 *
 * @see IpVendor
 */
class IpVendorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return IpVendor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IpVendor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
