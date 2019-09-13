<?php
use yii\helpers\Html;
use yii\helpers\Url;?>

    <div class="table-responsive">
        <table style="width: 100%; border: 1px solid #ddd; border-collapse: collapse"> <!--оформляем паблицу -->
            <thead>
            <tr style="background: #f9f9f9">

                <th style="padding: 8px; border: 1px solid #ddd;">Наименование</th>
                <th style="padding: 8px; border: 1px solid #ddd;">Кол-во</th>
                <th style="padding: 8px; border: 1px solid #ddd;">Цена</th>
                 <th style="padding: 8px; border: 1px solid #ddd; " >Сумма</th>
                            </tr>
            </thead>
            <tbody>

            <?php foreach ($session['cart'] as $id => $item): ?>
                <tr>
                    <td   align="center" style="padding: 8px; border: 1px solid #ddd;"><a href="<?= Url::to(['/product/view', 'id'=>$id], true)?>"><?= $item['name'] ?></a></td>
                    <td  align="center"  style="padding: 8px; border: 1px solid #ddd;"><?= $item['qty'] ?></td>
                    <td   align="center"  style="padding: 8px; border: 1px solid #ddd;"><?= $item['price'] ?></td>
                    <td  align="center"  style="padding: 8px; border: 1px solid #ddd;"><?= $item['qty'] * $item['price'] ?></td>

                </tr>

            <?php endforeach ?>

            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;" colspan="3">Итого: </td>
                <td style="padding: 8px; border: 1px solid #ddd;"><?= $session['cart.qty']?></td>
            </tr>
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;" colspan="3">На сумму: </td>
                <td style="padding: 8px; border: 1px solid #ddd;"><?= $session['cart.sum']?></td>
            </tr>

            </tbody>
        </table>
    </div>

