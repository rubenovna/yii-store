<?php
/**
 * Created by PhpStorm.
 * User: lilia
 * Date: 04.09.19
 * Time: 17:33
 */

namespace app\controllers;

use app\models\Cart;
use Yii;
use  app\models\Products;
use app\models\Category;

/*Array
(
    [1] => Array
    (
        [qty] => QTY
        [name] => NAME
        [price] => PRICE
        [img] => IMG
    )
    [10] => Array
    (
        [qty] => QTY
        [name] => NAME
        [price] => PRICE
        [img] => IMG
    )
)
    [qty] => QTY,
    [sum] => SUM
);*/

class CartController extends AppController
{


    public function actionAdd()
    {

        $id = Yii::$app->request->get('id');
         $qty = Yii::$app->request->get('qty');
         // проверяем $qty число или нет , нужно чтобы только число передовалась
        $qty = !$qty ? 1 : $qty;
        $product = Products::findOne($id);

        if (empty($product)) return false;
        //print_r($product);
        $session = Yii::$app->session;
        $session->open();
        //$session->destroy();
        $cart = new Cart();
        $cart->addToCart($product, $qty);
        //при добовление повара в карзину если ajax запрос не сработал мы можем сделать проверку если не сработал то мы
        // отправляем пользователя на ту страничку с которого пришел ,
        // противным случай оставляем все как есть
        if(!Yii::$app->request->isAjax){
            //отправляем пользователя на ту страничку с которого пришел пользователь
            return $this->redirect(Yii::$app->request->referrer);
        }
        $this->layout = false;

        /*  print_r($session['cart']);
          print_r($session['cart.qty']);
            print_r($session['cart.sum']);*/

        return $this->render('cart-modal', compact('session'));


    }


    public function actionDelItem()//delItem написано с большой буквы потому что слова состоит из двух честе del-item
    {
        //получаем id товара, открываем сессию
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));


    }

    public function actionShow(){

        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));

    }

    public function actionView(){
        return $this->render('view');


    }
}


