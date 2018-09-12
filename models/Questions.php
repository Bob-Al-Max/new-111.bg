<?php



namespace app\models;


class Questions extends \yii\db\ActiveRecord
{
   
    public function da(){
        return $this->getDirtyAttributes();
    }
    
    
   
}
