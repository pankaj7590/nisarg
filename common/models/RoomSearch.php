<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Room;

/**
 * RoomSearch represents the model behind the search form of `common\models\Room`.
 */
class RoomSearch extends Room
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cover_image', 'type', 'occupancy', 'beds', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['name', 'description'], 'safe'],
            [['charges'], 'number'],
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
        $query = Room::find();

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
            'cover_image' => $this->cover_image,
            'type' => $this->type,
            'charges' => $this->charges,
            'occupancy' => $this->occupancy,
            'beds' => $this->beds,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}