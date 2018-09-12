<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Questions */

$this->title = 'Create Questions';
$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questions-create">

    <h1><?= Html::encode($this->title) ?></h1>

   <?php  $form = ActiveForm::begin();  ?>
   
    <?=  $form->field($model, 'title')->textInput(); ?>
    
    <div>
       <div class="form-group">
                    <?= Html::submitButton('Задать вопрос', ['class' => 'btn btn-primary','name' => 'title']) ?>
                </div>  
    </div>
    
    <?php ActiveForm::end();  ?>
</div>
