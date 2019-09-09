<?php
/**
 * Created by PhpStorm.
 * User: lilia
 * Date: 26.08.19
 * Time: 12:45
 */

namespace app\components;
use yii\base\Widget;
use app\models\Category;
use Yii;

class MenuWidget extends Widget
{
    public $tpl;
    public $data;
    public $tree;
    public $menuHtml;


    public function init()
    {
        parent::init();
        if ($this->tpl === null){
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run()
 {
     //get cache получить даные из кеша
     $menu  = Yii::$app->cache->get('menu');
     if($menu) return $menu;
     $this->data = Category::find()->indexBy('id')->asArray()->all();
     $this->tree = $this->getTree();
     $this->menuHtml = $this->getMenuHtml($this->tree);
     //set cache
     Yii::$app->cache->set('menu',$this->menuHtml, 60);
    // var_dump($this->tree);
     return $this->menuHtml;
 }

 protected function getTree(){
        $tree = [];
        foreach ($this->data as $id => &$node){
           if (!$node['parent_id'])
               $tree[$id] = &$node;
           else
               $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
 }

 protected function getMenuHtml($tree){
        $str = '';
        foreach ($tree as  $category) {
            $str .= $this->catToTemplate($category);
        }
        return $str;
 }

 protected function catToTemplate($category){
        ob_start();
         include __DIR__ . '../../menu_tpl/' . $this->tpl;
        return ob_get_clean();
 }
}