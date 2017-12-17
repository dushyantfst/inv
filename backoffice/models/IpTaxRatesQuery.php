<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[IpTaxRates]].
 *
 * @see IpTaxRates
 */
class IpTaxRatesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return IpTaxRates[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IpTaxRates|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
