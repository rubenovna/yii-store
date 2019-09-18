<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\models\OrderItems;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1>Просмотор заказа № <?= $model->id?> <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
            'name',
            'email:email',
            'phone',
            'address',
            /*'status',*/
             ['attribute' =>'status',
                'value' => function($data){
        return !$data->status ? '<span class = "text-danger"> Активен</span>' : '<span class = "text-success">Завершен</span>';

                },
                'format' => 'html',
            ],
        ],
    ]) ?>

    <?php $items = $model->orderItems;?>
     <div class="table-responsive">
        <table class="table table-hover table-striped"> <!--оформляем паблицу -->
            <thead>
            <tr>
                <th>Наименование</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Сумма</th>
                <th>Стоимость</th>

            </tr>
            </thead>
            <tbody>

            <?php foreach ($items as $id =>  $item): ?>
                <tr>


                    <td><a href="<?=Url::to(['/product/view','id'=>$id ])?>"> <?= $item['name'] ?></a></td>
                    <td><?= $item['qty_item'] ?></td>
                    <td><?= $item['price'] ?></td>
                    <td><?= $item['sum_item']  ?></td>
                    <td><?= $item['qty_item'] * $item['price'] ?></td>

                </tr>

            <?php endforeach ?>
            <tr>
                <td colspan="4">Итого: </td>
                <td><?= $model->qty?></td>
            </tr>
            <tr>
                <td colspan="4">На сумму: </td>
                <td><?= $model->sum?></td>
            </tr>

            </tbody>
        </table>
    </div>





</div>
