<?php
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
?>

<div class="container">
    <h1>Установить фото </h1>
 

<div class="estates-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->fileInput()->label(''); ?>

  

    <div class="form-group">
        <?= Html::submitButton('Сохранить фотографию', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
