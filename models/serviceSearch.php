<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TbltypeOfService;

/**
 * serviceSearch represents the model behind the search form of `app\models\TbltypeOfService`.
 */
class serviceSearch extends TbltypeOfService
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['SID'], 'integer'],
            [['typeName'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = TbltypeOfService::find();

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
            'SID' => $this->SID,
        ]);

        $query->andFilterWhere(['like', 'typeName', $this->typeName]);

        return $dataProvider;
    }
}
