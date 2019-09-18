<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Category;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">


    <?php $form = ActiveForm::begin(); ?>

<?php /*echo $form->field($model,'parent_id' )->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name'))*/?>

    <div class="form-group field-category-parent_id required has-success">
        <label class="control-label" for="category-parent_id">Pодительская котегория</label>
        <select id="category-parent_id" class="form-control" name="Category[parent_id]" aria-required="true" aria-invalid="false">
            <option value="0">Самостоятельная категория</option>

        <?= \app\components\MenuWidget::widget(['tpl'=>'select_cat', 'model' =>$model])?>

        </select>


    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
