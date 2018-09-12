<?php


namespace app\models;


class Answers extends \yii\db\ActiveRecord
{
  
    public function getQuestion(){
        
        return $this->hasOne(Questions::className(), ['id' => 'question_id']);
    }
}
