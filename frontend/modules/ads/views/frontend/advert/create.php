<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\modules\ads\assets\ModuleAssets;

ModuleAssets::register($this);
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => 'store']) ?>

<?= $form->field($mark, 'name')->dropDownList($items)->label('Марка'); ?>
<?= $form->field($model, 'name')->dropDownList([''])?>
<?= $form->field($car, 'mileage')->label('Пробег'); ?>
<?= $form->field($options, 'name')->checkboxList($itemOptions); ?>
<?= $form->field($advert, 'price')->label('Цена'); ?>
<?= $form->field($advert, 'phone')->label('Телефон'); ?>
<?= $form->field($image, 'picture[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Вход', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>