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
 * @property string $img
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
            [['keywords', 'description', 'img'], 'string', 'max' => 55],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => '№ категории',
            'name' => 'Имя тавара',
            'content' => 'Качество',
            'price' => 'Цена',
            'keywords' => 'Ключевое слова',
            'description' => 'Описание',
            'img' => 'Картинка',
            'hit' => 'Хит продаж',
            'new' => 'New',
            'sale' => 'Скидка',
        ];
    }

  public function getCategory(){
        return $this->hasOne(Category::class(),['parent_id' => 'id']);
  }


}
