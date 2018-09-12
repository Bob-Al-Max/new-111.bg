<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <sctipt>
  
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
        .navbar-inverse .navbar-brand {
    color: red;
    font-weight: bold;
    
  
}
        .navbar-inverse .navbar-brand:hover{
    color: #444444;
    
  
}


  .navbar-inverse {
    background-color: #ffffff!important;
    border-color: #d9edf7!important;
}


.navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus {
    color: #fff;
    background-color: #337ab7;
}


#w1 > li:nth-child(6) > form > button, #w1 > li > a:hover{
    color:lightblue;
}
    </style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <img style="z-index: 9999999999!important;position:fixed;right:60px;top:3px" class="img-circle " width="40" src="http://new-111.bg/uploads/0b7dbd1804e1d8d9f34214b40a7a0705.jpg">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'Личный профиль', 'url' => ['/uprofile/uprofile/view','id' => Yii::$app->user->id]],
            ['label' => 'Questions', 'url' => ['/questions/questions/index']],
            ['label' => 'Админка', 'url' => ['/admin/default/index']],
            ['label' => 'Регистрация', 'url' => ['/site/signup']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Войти', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Выти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
       
    ]);
    NavBar::end();
    

    ?>

   <div class="container">

        <?= $content ?>
    </div>


</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
    
</body>
</html>
<?php $this->endPage() ?>
