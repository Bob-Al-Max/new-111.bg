<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $searchModel app\models\AnswersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Answers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answers-index">
<?php //print_r($answer) ?>
  <?php foreach ($answer as $ans) : ?>
    <p>
    <?php  echo ': '.$ans->answer_text;  ?>
    </p>
    <?php endforeach; ?>
</div>

