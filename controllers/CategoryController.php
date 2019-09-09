<?php
/**
 * Created by PhpStorm.
 * User: lilia
 * Date: 27.08.19
 * Time: 13:59
 */

namespace app\controllers;

use app\models\Category;
use app\models\Products;
use Yii;
use yii\data\Pagination;


class CategoryController extends AppController
{
    public function actionIndex()
    {
        $hits = Products::find()->where(['hit' => '1'])->limit(4)->all();
        $this->setMeta('E-SHOPPER');

        return $this->render('index', compact('hits'));
    }

    public function actionView($id)
    {
        /* $id = Yii::$app->request->get('id');*///можно доставать данные и таким оброзом

        $category = Category::findOne($id);

        /* $products = Products::find()->where(['category_id' => $id])->all();*/
// проверяем если масив категорий пуст то выдаем ошибку 404
        if (empty($category)) {
            throw new \yii\web\HttpException(404, '
         Такой категории нет.');
        }


        //делаем пагинацию
        $query = Products::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3,
            'forcePageParam' => false, 'pageSizeParam' => false]);//'pageSize' - каличество картинок на странице,forcePageParam и
        // pageSizeParam ставив false чтобы в cсылке не отображалась "page=2&per-page=3'- вот такая белеберда
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();


        $this->setMeta('E-SHOPPER |' . $category->name, $category->keyword, $category->description);


        return $this->render('view', compact('products', 'pages', 'category'));

    }


    public function actionSearch()

    {
        $q = trim(Yii::$app->request->get('q'));


        $this->setMeta('E-SHOPPER | Поиск ' . $q);// сделали title для поискового запроса
        if (!$q)

            return $this->render('search');

        $query = Products::find()->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3,
            'forcePageParam' => false, 'pageSizeParam' => false]);//'pageSize' - каличество картинок на странице,forcePageParam и
        // pageSizeParam ставив false чтобы в cсылке не отображалась "page=2&per-page=3'- вот такая белеберда
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();



        return $this->render('search', compact('products', 'pages', 'q'));


    }

}