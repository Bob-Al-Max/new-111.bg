<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\uprofile\models\UserProfile */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">
                <img src="/web/uploads/users/avatar/<?php echo $model->image;   ?>" class="img-rounded" width="200">
               
                <div style="margin-top: 10px">  
                  <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Set Image', ['set-image', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
            ]) ?> </div>
            </div>
            
            <div class="col-md-6">
                <div class="col-md-12">    <h1><?php echo $model->first_name.' '.$model->last_name;  ?></h1>  
                    <p class="well">
                    <?php echo $model->user_info;  ?>
                </p>
                </div>
                
                <div class="clearfix"></div>
             
                

            </div>
            
            
            <div class="col-md-3">
                <p  style="height:100px;border-radius: 10px; padding:15px" class="bg-success">Здесь будет информация о пользователем - личные данные<br>
                страна, город, образование, работа</p>
                <ul>
                    <li><a href="">Ответы(<?php echo count($model->answers);   ?>)</a></li>
                    <li><a href="">Вопросы</a></li>
                    <li><a href="">Активность</a></li>
                    <li><a href="">Последователи</a></li>
                    <li><a href="">Следуемые</a></li>
                    <li><a href="">Темы</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div style="margin-top:30px" class="row">
        <div class="col-md-12">
                            
                <div class="col-md-3">
              <h5>Вопросы, заданные Вами</h5>       
                    
                    <?php foreach ($model->questions as $question): ?>
                    <p><i >Q&A: <span class="text-primary"><?php echo $question->title; ?></span></i></p><hr>
                    <?php endforeach; ?>
                </div>
                
                <div class="col-md-6">
                     <h2>Ответы</h2>
                    
                     <?php foreach($model->answers as $answer) {  ?>
                   <?php echo $answer->answer_text;  ?>
                    
                    <hr>
                    <div style="margin-bottom:20px;"></div>
                     
                     <?php }  ?>
                </div>
        </div>
    </div>
</div>
<div class="user-profile-view">

  

 
   

</div>
