<?php
/**
 * Created by PhpStorm.
 * User: lilia
 * Date: 27.08.19
 * Time: 14:01
 */

namespace app\controllers;


use yii\web\Controller;

class AppController extends Controller
{

    protected function setMeta($title = null, $keyword = null, $discription = null){

        $this->view->title  = $title;
        $this->view->registerMetaTag(['name' => 'keyword', 'content' => "$keyword"]);
        $this->view->registerMetaTag(['name' => 'discription', 'content' => "$discription"]);

    }

}