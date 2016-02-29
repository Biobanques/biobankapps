<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Software;

/**
 * SofwareSearch represents the model behind the search form about `app\models\Software`.
 */
class SofwareSearch extends Software
{
    public $global_keywords;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'prix', 'langue_fr', 'langue_en', 'langue_autres'], 'integer'],
            [['nom', 'societe', 'url_societe', 'url_logiciel', 'licence', 'descriptif_fr', 'descriptif_en', 'screenshot_1', 'screenshot_2', 'screenshot_3', 'screenshot_4', 'screenshot_5', 'logo', 'keywords_fr', 'keywords_en', 'contact_nom', 'contact_prenom', 'contact_login', 'contact_password', 'contact_email', 'contact_phone', 'global_keywords'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Software::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'prix' => $this->prix,
            'langue_fr' => $this->langue_fr,
            'langue_en' => $this->langue_en,
            'langue_autres' => $this->langue_autres,
        ]);

        $query->andFilterWhere(['like', 'nom', $this->nom])
                ->andFilterWhere(['like', 'societe', $this->societe])
                ->andFilterWhere(['like', 'url_societe', $this->url_societe])
                ->andFilterWhere(['like', 'url_logiciel', $this->url_logiciel])
                ->andFilterWhere(['like', 'licence', $this->licence])
                ->andFilterWhere(['like', 'descriptif_fr', $this->descriptif_fr])
                ->andFilterWhere(['like', 'descriptif_en', $this->descriptif_en])
                ->andFilterWhere(['like', 'screenshot_1', $this->screenshot_1])
                ->andFilterWhere(['like', 'screenshot_2', $this->screenshot_2])
                ->andFilterWhere(['like', 'screenshot_3', $this->screenshot_3])
                ->andFilterWhere(['like', 'screenshot_4', $this->screenshot_4])
                ->andFilterWhere(['like', 'screenshot_5', $this->screenshot_5])
                ->andFilterWhere(['like', 'logo', $this->logo])
//            ->andFilterWhere(['like', 'keywords_fr', $this->keywords_fr])
//            ->andFilterWhere(['like', 'keywords_en', $this->keywords_en])
                //  Add or condition for keywords language
                ->andFilterWhere(['or',
                    ['like', 'keywords_fr', $this->global_keywords],
                    ['like', 'keywords_en', $this->global_keywords]
                ])
                ->andFilterWhere(['like', 'contact_nom', $this->contact_nom])
                ->andFilterWhere(['like', 'contact_prenom', $this->contact_prenom])
                ->andFilterWhere(['like', 'contact_login', $this->contact_login])
                ->andFilterWhere(['like', 'contact_password', $this->contact_password])
                ->andFilterWhere(['like', 'contact_email', $this->contact_email])
                ->andFilterWhere(['like', 'contact_phone', $this->contact_phone]);

        return $dataProvider;
    }

}