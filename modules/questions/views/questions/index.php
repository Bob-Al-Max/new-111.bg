<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QuestionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Questions';
$this->params['breadcrumbs'][] = $this->title;
?>
<a href="<?php  echo Url::to(['questions/create']); ?>" class="btn btn-default pull-right">Задать вопрос</a>
<div  class="col-md-9">

    
   

 <?php foreach ($questions as $question) :  ?>
    
    <div style="margin-right: 10px" class="row">
        <div style="border:1px solid lightblue;border-radius: 10px;padding: 15px;margin-bottom: 30px;" class="col-md-12">
            <div class="col-md-2">
                <?php if($question->profile->image) { ?>
                <h6><?php echo $question->profile->first_name; ?></h6>
                <img src="/web/uploads/users/avatar/<?php echo $question->profile->image; ?>" width="70" class="img-thumbnail">
                <?php } else { ?>
                 <h6>Анонимный пользователь</h6>
                <img src="https://a2-images.myspacecdn.com/images03/35/f531fdf6063744cfa9fee314c6d8b838/300x300.jpg" width="70" class="img-thumbnail">
                
         
                <?php  } ?>
                
            </div>
           
             <div class="col-md-10">
                 <div style="margin-bottom: 0px" > <h3 style="margin:0px;padding: 0px"><a href="<?php  echo Url::to(['questions/view','id' => $question->id]); ?>"><?php echo $question->title; ?></a></h3></div> 
            </div>
            
            <?php //foreach ($question->answers as $answer) :  ?> 
        <?php 
       // echo '<strong>Ответ:</strong> '.$answer->answer_text;
         ?>
        <?php //endforeach;  ?>
        </div>
        
    </div>
   
    <?php endforeach; ?>

</div>
<div style="height:500px;background:  lightblue;border-radius: 10px" class="col-md-3"></div>
<div class="clearfix"></div>
