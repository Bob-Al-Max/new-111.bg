<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\ActiveForm;

use vova07\imperavi\Widget;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\models\Questions */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo '<pre>';
print_r(Yii::$app->request->isAjax);
echo '</pre>';
?>
<div class="questions-view">

   



  
    <div class="col-md-6">  <h1> <?php echo $this->title;  ?></h1>
    
         <?php $form = ActiveForm::begin(['id' =>
             'ans',
              ]); ?>
    
        <?= $form->field($answer_form, 'answer')->widget(Widget::className(), [
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'plugins' => [
            'clips',
            'fullscreen',
        ],
    ],
]); ?></div><div class="clearfix"></div>
    
                         <div class="form-group">
                    <?= Html::submitButton('Ответить', ['class' => 'btn btn-primary', 'name' => 'answer']) ?>
                </div>

        <?php ActiveForm::end(); ?>


    
    <?php foreach($model->answers as $answer):  ?>
    <p><?php echo $answer->answer_text;  ?></p>
    <?php endforeach;  ?>
    
    
        
   
</div>

<?php
$js = <<<JS
 $('#ans').on('beforeSubmit', function(){
 var data = $(this).serialize();
 $.ajax({
 url: 'http://new-111.bg/index.php?r=questions%2Fquestions%2Fview&id='.$model->id,
 type: 'POST',
 data: data,
 success: function(res){
 console.log(res);
 },
 error: function(){
 alert('Error!');
 }
 });
 return false;
 });
JS;
?>


