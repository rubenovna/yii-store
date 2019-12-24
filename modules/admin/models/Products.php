<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $keywords
 * @property string $description
 * @property string $image
 * @property string $hit
 * @property string $new
 * @property string $sale
 *
 * @property Category $category
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $image;
    public $gallery;


    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }




    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'], 'integer'],
            [['content', 'hit', 'new', 'sale'], 'string'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 50],
            [['keywords', 'description', 'image'], 'string', 'max' => 55],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' =>
                Category::className(), 'targetAttribute' => ['category_id' => 'id']],

             [['image'], 'file', 'extensions' => 'png, jpg'],
            [['gallery'], 'file',  'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID товара',
            'category_id' => '№ категории',
            'name' => 'Имя тавара',
            'content' => 'Качество',
            'price' => 'Цена',
            'keywords' => 'Ключевое слова',
            'description' => 'Описание',
            'image' => 'Картинка',
            'gallery' => 'Галерея(не больше 4 шт)',
            'hit' => 'Хит продаж',
            'new' => 'New',
            'sale' => 'Скидка',
        ];
    }

  public function getCategory(){
        return $this->hasOne(Category::className(),['id' => 'category_id']);
  }

 /* public function upload(){

        if($this->validate()) {
            $path = 'upload/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path);
           // @unlink($path);
            return true;
        }else{
            return false;

        }
  }*/


    /*public function uploadGallery(){

        if($this->validate()) {
            foreach ($this->gallery as $file)
            $path = 'upload/store/' . $file->baseName . '.' . $file->extension;
            $file->saveAs($path);
            $this->attachImage($path);
            @unlink($path);
            return true;
        }else{
            return false;

        }
    }*/



}
