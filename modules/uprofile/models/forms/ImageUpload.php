<?php

namespace app\modules\uprofile\models\forms;
use yii\base\Model;
use Yii;
use yii\web\UploadedFile;

class ImageUpload extends Model{
    
    public $image;
    
       public function rules()
    {
        return [
            [['image'],'required'],
            [['image'],'file','extensions' => 'jpg,png']
          
        ];
    }
    
    
    
    
    
     public function uploadFile($file, $currentImage){
      
        $this->image = $file;
        
    if($this->validate()){
  
        if($this->fileExist($currentImage)){
      
       $this->deleteCurrentImage($currentImage);
  }
       
        
        $filename = $this->generateFilename();
        $file->saveAs($this->getFolder(). $filename);
        
        return $filename;
    }
    }
    
    
    private function getFolder(){
        
        return \Yii::getAlias('@webroot').'/uploads/users/avatar/';
    }
    
    
    private function generateFilename(){
        
        return strtolower(md5(uniqid($this->image->baseName)) .'.'. $this->image->extension);
    }
    
    
    public function fileExist($currentImage){
        
        if(!empty($currentImage) && $currentImage != null){
            
            return file_exists($this->getFolder().$currentImage);
        }
        
    }






    public function deleteCurrentImage($currentImage){
   if(file_exists($this->getFolder().$currentImage)){
          unlink($this->getFolder().$currentImage);
      }
    }
   
    
}
