<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\modules\ads\assets\ModuleAssets;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

ModuleAssets::register($this);
?>
<?php


?>

<?php $form = ActiveForm::begin([]) ?>

<?= $form->field($mark, 'name')->dropDownList($items)->label('Марка'); ?>
<?= $form->field($model, 'name')->dropDownList([])?>
<?= $form->field($car, 'mileage')->label('Пробег'); ?>
<?= $form->field($options, 'name')->checkboxList($itemOptions); ?>
<?= $form->field($advert, 'price')->label('Цена'); ?>
<?= $form->field($advert, 'phone')->label('Телефон'); ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Вход', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>