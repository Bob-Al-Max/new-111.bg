<?php

namespace app\modules\answers\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\answers\models\Answers;

/**
 * AnswersSearch represents the model behind the search form of `app\models\Answers`.
 */
class AnswersSearch extends Answers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'question_id', 'created_at', 'updated_at', 'user_id', 'is_anonymous'], 'integer'],
            [['answer_text'], 'safe'],
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
        $query = Answers::find();

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
            'question_id' => $this->question_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_id' => $this->user_id,
            'is_anonymous' => $this->is_anonymous,
        ]);

        $query->andFilterWhere(['like', 'answer_text', $this->answer_text]);

        return $dataProvider;
    }
}
