<?php

namespace frontend\modules\ads\models\entity\advert;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\ads\models\entity\advert\Advert;
use frontend\modules\ads\models\entity\car\Car;

/**
 * AdvertSearch represents the model behind the search form of `frontend\modules\ads\models\entity\advert\Advert`.
 */
class AdvertSearch extends Advert
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_car', 'price', 'status', 'created_at', 'updated_at'], 'integer'],
            [['phone'], 'safe'],
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
        $query = Advert::find()->with('cars','images');


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
            'id_car' => $this->id_car,
            'price' => $this->price,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
}
