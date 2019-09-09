<?php
/**
 * Created by PhpStorm.
 * User: lilia
 * Date: 29.08.19
 * Time: 13:24
 */

namespace app\controllers;

use app\models\Category;
use app\models\Products;
use Yii;

class ProductController extends AppController
{

    public function actionView($id)
    {
        /*$id = Yii::$app->request->get('id');//можно доставать данные и таким оброзом*/
        //ленивая загрузка
        $product = Products::findOne($id);
         if (empty($product)) {
         throw new \yii\web\HttpException(404, '
         Такого тавара  нет.');
     }
        //var_dump($product);

        //жадная загрузка
       // $product = Products::find()->with('category')->where(['id' => $id])->limit(1)->one();

         $hits = Products::find()->where(['hit' => '1'])->limit(6)->all();
         //для title
        $this->setMeta('E-SHOPPER |' . $product->name, $product->keywords, $product->description);

        return $this->render('view', compact('product', 'hits'));

    }




}