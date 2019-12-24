<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Products */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="products-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <!--$form->field($model, 'category_id')->textInput() -->

    <div class="form-group field-product-category_id required has-success">
        <label class="control-label" for="product-category_id">Pодительская котегория</label>
        <select id="product-category_id" class="form-control" name="Product[category_id]" aria-required="true"
                aria-invalid="false">


            <?= \app\components\MenuWidget::widget(['tpl' => 'select_products', 'model' => $model]) ?>

        </select>


    </div>



    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <!-- место этого редактора тут картинки загружаются по другому мы установила новый ретакто чтобы картинки устанавливать -->

    <?php /*echo $form->field($model, 'content')->widget(CKEditor::className(),[
    'editorOptions' => [
    'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
    'inline' => false, //по умолчанию false
    ],
    ]);
    */ ?>

    <?php echo $form->field($model, 'content')->widget(CKEditor::className(), [

        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [/* Some CKEditor Options */])
    ]);
    ?>


    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>
    <?= $form->field($model, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?= $form->field($model, 'hit')->dropDownList(['0' => 'Не является хитом', '1' => 'Хит продаж'], ['prompt' => '']) ?>

    <?= $form->field($model, 'new')->dropDownList(['0' => 'Не новая калекция', '1' => 'Новая калекция'], ['prompt' => '']) ?>

    <?= $form->field($model, 'sale')->checkbox(['0', '1']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
