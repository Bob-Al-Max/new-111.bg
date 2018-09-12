<?php

namespace app\modules\questions\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use app\models\User;
use app\modules\uprofile\models\UserProfile;
use app\modules\answers\models\Answers;

/**
 * This is the model class for table "questions".
 *
 * @property int $id
 * @property string $title
 * @property int $category_id
 * @property int $author_id
 * @property int $created_at
 * @property int $updated_at
 * @property int $is_anonymus
 *
 * @property Answers[] $answers
 * @property User $author
 */
class Questions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'questions';
    }
    
    
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'string'],
            [['category_id', 'author_id'], 'required'],
            [['category_id', 'author_id', 'created_at', 'updated_at', 'is_anonymus'], 'integer'],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'category_id' => 'Category ID',
            'author_id' => 'Author ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_anonymus' => 'Is Anonymus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answers::className(), ['question_id' => 'id']);
    }
    
    /*
     * Это функция под вопрос, так как дублирует getAuthor. Это нужно доработать
     */

    public function getAuthor()
    {
        return $this->hasOne(UserProfile::className(), ['id' => 'author_id']);
    }
    
    public function getProfile(){
        return $this->hasOne(UserProfile::className(), ['id' => 'author_id']);
    }
}
