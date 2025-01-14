<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
/**
* MahasiswaSearch represents the model behind the search form of `common\models\Mahasiswa`.
 */
class MahasiswaSearch extends Mahasiswa
{
     /**
    * {@inheritdoc}
    */
    public function rules()
    {
        return [
            [['id_mahasiswa', 'id_prodi'], 'integer'],
            [['nim', 'nama'], 'safe'],
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
        $query = Mahasiswa::find();
 
        // add conditions that should always apply here
 
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
 
        $this->load($params);
 
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
 //         // $query->where('0=1');
            return $dataProvider;
        }
 
        // grid filtering conditions
        $query->andFilterWhere([
            'id_mahasiswa' => $this->id_mahasiswa,
            'id_prodi' => $this->id_prodi,
        ]);
 
        $query->andFilterWhere(['like', 'nim', $this->nim])
            ->andFilterWhere(['like', 'nama', $this->nama]);
 
            return $dataProvider;
    }
}
