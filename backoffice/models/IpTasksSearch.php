<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\IpTasks;

/**
 * IpTasksSearch represents the model behind the search form about `app\models\IpTasks`.
 */
class IpTasksSearch extends IpTasks
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_id', 'project_id', 'task_status', 'tax_rate_id'], 'integer'],
            [['task_name', 'task_description', 'task_finish_date'], 'safe'],
            [['task_price'], 'number'],
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
        $query = IpTasks::find();

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
            'task_id' => $this->task_id,
            'project_id' => $this->project_id,
            'task_price' => $this->task_price,
            'task_finish_date' => $this->task_finish_date,
            'task_status' => $this->task_status,
            'tax_rate_id' => $this->tax_rate_id,
        ]);

        $query->andFilterWhere(['like', 'task_name', $this->task_name])
            ->andFilterWhere(['like', 'task_description', $this->task_description]);

        return $dataProvider;
    }
}
