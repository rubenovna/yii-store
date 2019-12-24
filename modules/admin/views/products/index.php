<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукт';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать продукт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            /*['class' => 'yii\grid\SerialColumn'],*/

            'id',
           // 'category_id',
               [ 'attribute' =>'category_id',
                'value' => function($date){
                    return $date->category['name'] ? $date->category['name'] : "Сомостоятельная категория" ;

                },
                ],


            'name',
            //'content:ntext',
            'price',
            //'keywords',
            //'description',
            //'img',
            //'hit',
            [ 'attribute' =>'hit',
                'value' => function($date){
                    return !$date->hit ? '<span class="text-danger">Нет</span>' :'<span class="text-success">Да</span>';
                },
                'format' => 'html',
            ],
            //'new',
             [ 'attribute' =>'new',
                'value' => function($date){
                    return !$date->new ? '<span class="text-danger">Нет</span>' :'<span class="text-success">Да</span>';
                },
                'format' => 'html',
                ],
            //'sale',
            [ 'attribute' =>'sale',
                'value' => function($date){
                    return !$date->sale ? '<span class="text-danger">Нет</span>' :'<span class="text-success">Да</span>';
                },
                'format' => 'html',
                ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
