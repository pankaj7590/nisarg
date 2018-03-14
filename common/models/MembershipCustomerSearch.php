<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MembershipCustomer;

/**
 * MembershipCustomerSearch represents the model behind the search form of `common\models\MembershipCustomer`.
 */
class MembershipCustomerSearch extends MembershipCustomer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'membership_id', 'customer_id', 'type', 'from_date', 'to_date', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['discount', 'charges'], 'number'],
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
        $query = MembershipCustomer::find();

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
            'id' => $this->id,
            'membership_id' => $this->membership_id,
            'customer_id' => $this->customer_id,
            'type' => $this->type,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'discount' => $this->discount,
            'charges' => $this->charges,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
