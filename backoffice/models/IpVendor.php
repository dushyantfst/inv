<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ip_vendor".
 *
 * @property integer $vendor_id
 * @property string $vendor_name
 * @property string $vendor_address
 * @property string $vendor_email
 * @property string $vendor_phone
 * @property integer $vendor_pincode
 */
class IpVendor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ip_vendor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendor_pincode'], 'integer'],
            [['vendor_name', 'vendor_email'], 'string', 'max' => 100],
            [['vendor_address'], 'string', 'max' => 512],
            [['vendor_phone'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vendor_id' => Yii::t('app', 'Vendor ID'),
            'vendor_name' => Yii::t('app', 'Vendor Name'),
            'vendor_address' => Yii::t('app', 'Vendor Address'),
            'vendor_email' => Yii::t('app', 'Vendor Email'),
            'vendor_phone' => Yii::t('app', 'Vendor Phone'),
            'vendor_pincode' => Yii::t('app', 'Vendor Pincode'),
        ];
    }

    /**
     * @inheritdoc
     * @return IpVendorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IpVendorQuery(get_called_class());
    }
}
