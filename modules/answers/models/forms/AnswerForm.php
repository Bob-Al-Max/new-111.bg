<?php
namespace app\modules\answers\models\forms;

use Yii;
use yii\base\Model;
use app\modules\answers\models\Answers;

class AnswerForm extends Model
{
    
    public $answer;


    public function rules(){
        return [
           
            ['answer', 'string'],
            ['answer', 'required']
            
        ];
    }
    
    
    public function attributeLabels() {
        return [
            'answer' => 'Ответить'
        ];
    }
    
    
    public function saveAnswer($question_id){
        
        $a = new Answers();
        $a->question_id = $question_id;
        $a->answer_text = $this->answer;
        $a->user_id = \Yii::$app->user->id;
        $a->is_anonymous = 1;
        $a->save();
        
    }
   
}
