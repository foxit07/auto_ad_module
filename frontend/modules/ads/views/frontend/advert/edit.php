<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\modules\ads\assets\ModuleAssets;

ModuleAssets::register($this);
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => '/frontend/update']) ?>

<?= $form->field($mark, 'name')->dropDownList($items, ['options' =>[ $advert->car->mark->id => ['Selected' => true]]])->label('Марка'); ?>
<?= $form->field($model, 'name')->dropDownList([$advert->car->model->name])->label('Модель')?>
<?= $form->field($car, 'mileage')->textInput(['value' => $advert->car->mileage])->label('Пробег'); ?>
<?= $form->field($options, 'name')->checkboxList($itemOptions,['checked' => $itemsCarOptions]); ?>
<?= $form->field($advert, 'price')->textInput(['value' => $advert->price])->label('Цена'); ?>
<?= $form->field($advert, 'phone')->textInput(['value' => $advert->phone])->label('Телефон'); ?>
<?= $form->field($image, 'picture[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>