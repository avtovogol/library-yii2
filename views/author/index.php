<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AuthorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Authors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Author', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'CountBooks',
//            [    'attribute'=>'CountBooks',
//                'label'=>'Количество книг   ',
//                'format'=>'text', // Возможные варианты: raw, html
//                'content'=>function($data){
//                    return $data->getCountBooks();
//                },
//            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
