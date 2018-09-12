<?php

namespace app\modules\uprofile\models;
use app\modules\uprofile\models\forms\ImageUpload;
use Yii;
use app\models\User;
use app\modules\questions\models\Questions;

/**
 * This is the model class for table "user_profile".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $user_info
 * @property string $photo
 *
 * @property User $id0
 */
class UserProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name'], 'required'],
            [['user_info', 'image'], 'string'],
            [['first_name', 'last_name'], 'string', 'max' => 100],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'user_info' => 'User Info',
            'image' => 'Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }
    

    
  
    
    public function getQuestions(){
        
       
        return $this->hasMany(Questions::className(), ['author_id' => 'id']);
    }
    
    
    public function getAnswers(){
        
        return $this->hasMany(\app\modules\answers\models\Answers::className(), ['user_id' => 'id']);
    }

    





    public function savePhoto($filename){
        
        $this->image = $filename;
       return $this->save(false);
    }
    
    public function deletePhoto(){
        
        $imgUploadModel = new ImageUpload();
        $imgUploadModel->deleteCurrentImage($this->image);
                
    }
    
    
    public function afterDelete() {
        return $this->deletePhoto();
        parent::beforeDelete();
    }
    
}
