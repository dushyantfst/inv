<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ip_tax_rates".
 *
 * @property integer $tax_rate_id
 * @property string $tax_rate_name
 * @property string $tax_rate_percent
 */
class IpTaxRates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ip_tax_rates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tax_rate_name'], 'string'],
            [['tax_rate_percent'], 'required'],
            [['tax_rate_percent'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tax_rate_id' => Yii::t('app', 'Tax Rate ID'),
            'tax_rate_name' => Yii::t('app', 'Tax Rate Name'),
            'tax_rate_percent' => Yii::t('app', 'Tax Rate Percent'),
        ];
    }

    /**
     * @inheritdoc
     * @return IpTaxRatesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IpTaxRatesQuery(get_called_class());
    }
}
