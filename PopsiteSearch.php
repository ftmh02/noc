<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Users;

class PopsiteSearch
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return[
            [['id','service'],'integer'],
            [['name','address'],'varchar(255)'],
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


    public function search($params)
    {
        $query = Popsite::find();
        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
        ]);

        // if (!($this->load($params))) {
        //     return $dataProvider;
        // }


        $query->andFilterWhere([
            'id' => $this->id,
            'service' => $this->service,
            'name' => $this->name,
            'address' => $this->address,    
        ]);

        $query->andFilterWhere(['like','service',$this->attributes['service']])
            ->andFilterWhere(['like','id',$this->attributes['id']])
            ->andFilterWhere(['like','name',$this->attributes['name']])
            ->andFilterWhere(['like','address',$this->attributes['address']]);
            return $dataProvider;
    }

}