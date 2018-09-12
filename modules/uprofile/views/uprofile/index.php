<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\uprofile\models\UserProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Profile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
        

            
            'first_name',
            'user_info:ntext',
            [
                'format' => 'html',
                'label' => 'Image',
                'value' => function($data){
        return $data->image;
                },
                ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>