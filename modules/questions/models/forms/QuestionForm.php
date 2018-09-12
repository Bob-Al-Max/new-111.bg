<?php

namespace app\modules\questions\models\forms;
use Yii;
use yii\base\Model;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use app\modules\questions\models\Questions;

class QuestionForm extends Model {
    
    public $title;


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }
    
    
        public function rules(){
        return [
           
            ['title', 'string'],
            ['title', 'required']
            
        ];
    }
    

    
    
    
    public function saveQuestion(){
        $q = new Questions();
        
        $q->title = $this->title;
        $q->category_id = 1;
        $q->author_id = Yii::$app->user->id;
        $q->is_anonymus = 1; 
        $q->save();
        
    }
   
}
