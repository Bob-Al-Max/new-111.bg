<?php

namespace app\modules\answers\models;
use app\modules\questions\models\Questions;
use app\models\User;

use Yii;

/**
 * This is the model class for table "answers".
 *
 * @property int $id
 * @property int $question_id
 * @property string $answer_text
 * @property int $created_at
 * @property int $updated_at
 * @property int $user_id
 * @property int $is_anonymous
 *
 * @property Questions $question
 * @property User $user
 */
class Answers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'answers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_id', 'user_id'], 'required'],
            [['question_id', 'created_at', 'updated_at', 'user_id', 'is_anonymous'], 'integer'],
            [['answer_text'], 'required'],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Questions::className(), 'targetAttribute' => ['question_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question_id' => 'Question ID',
            'answer_text' => 'Answer Text',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
            'is_anonymous' => 'Is Anonymous',
        ];
    }
    
    public function doAnswer(){
        $answer = new Answers();
        
        
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Questions::className(), ['id' => 'question_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    
    
}
