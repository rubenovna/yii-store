<?php
use yii\helpers\Html;


if (!empty($session['cart'])):?>

    <div class="table-responsive">
        <table class="table table-hover table-striped"> <!--оформляем паблицу -->
            <thead>
            <tr>
                <th>Фото</th>
                <th>Наименование</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <td><span class="glyphicon glyphicon-remove " aria-hidden="true"></span></td>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($session['cart'] as $id => $item): ?>
                <tr>
                    <td><?= Html::img("@web/images/products/{$item['img']}", ['alt' => $item['name'], 'height' => 50]) ?></td>


                    <td><?= $item['name'] ?></td>
                    <td><?= $item['qty'] ?></td>
                    <td><?= $item['price'] ?></td>
                    <td> <!--крестик для удаление товара-->
                        <span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item"
                              aria-hidden="true"></span>
                    </td>
                </tr>

            <?php endforeach ?>

            <tr>
                    <td colspan="4">Итого: </td>
                    <td><?= $session['cart.qty']?></td>
                </tr>
                <tr>
                    <td colspan="4">На сумму: </td>
                    <td><?= $session['cart.sum']?></td>
                </tr>

            </tbody>
        </table>
    </div>


<?php else: ?>
    <h2>Карзина пуста</h2>
<?php endif; ?>
