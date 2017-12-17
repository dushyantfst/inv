<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\IpVendor;

/**
 * IpVendorSearch represents the model behind the search form about `app\models\IpVendor`.
 */
class IpVendorSearch extends IpVendor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendor_id', 'vendor_pincode'], 'integer'],
            [['vendor_name', 'vendor_address', 'vendor_email', 'vendor_phone'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = IpVendor::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'vendor_id' => $this->vendor_id,
            'vendor_pincode' => $this->vendor_pincode,
        ]);

        $query->andFilterWhere(['like', 'vendor_name', $this->vendor_name])
            ->andFilterWhere(['like', 'vendor_address', $this->vendor_address])
            ->andFilterWhere(['like', 'vendor_email', $this->vendor_email])
            ->andFilterWhere(['like', 'vendor_phone', $this->vendor_phone]);

        return $dataProvider;
    }
}
