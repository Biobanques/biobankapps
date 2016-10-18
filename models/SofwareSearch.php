<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Software;

/**
 * SofwareSearch represents the model behind the search form about `app\models\Software`.
 */
class SofwareSearch extends Software {

    public $global_keywords;
    public $tags = [];

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['id', 'price', 'language_en', 'language_others'], 'integer'],
                [['name', 'company', 'url_company', 'url_software', 'license', 'description', 'keywords', 'contact_email', 'contact_phone', 'global_keywords','usage_rights'], 'safe'],
                [['tags'], 'safe'],
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
            'price' => $this->price,
            'language_en' => $this->language_en,
            'language_others' => $this->language_others,
            'usage_rights' => $this->usage_rights,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'company', $this->company])
                ->andFilterWhere(['like', 'url_company', $this->url_company])
                ->andFilterWhere(['like', 'url_software', $this->url_software])
                ->andFilterWhere(['like', 'license', $this->license])
                ->andFilterWhere(['like', 'description', $this->description])
                ->andFilterWhere(['like', 'keywords', $this->global_keywords])
                ->andFilterWhere(['like', 'contact_email', $this->contact_email])
                ->andFilterWhere(['like', 'contact_phone', $this->contact_phone]);
        if (isset($this->tags) && is_array($this->tags) && count($this->tags) > 0) {
            $query->leftJoin('tag_software', '`tag_software`.`software_id` = `software`.`id`')
                    ->where(['in', 'tag_software.tag_id', $this->tags]);
        }

        return $dataProvider;
    }

}
