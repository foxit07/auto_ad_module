<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<?php foreach ($adverts as $advert): ?>
<div class="col-md-12">
    <div class="col-md-3">
        <a href="<?='/frontend/view/' . $advert->id ?>"> <?=$advert->car->mark->name . ' ' . $advert->car->model->name ?> </a>
    </div>
    <div class="col-md-4">
        <?php if($advert->images): ?>
        <img src="http://auto.loc/uploads/<?=$advert->images[0]->path  ?>" width="146" height="106">
        <?php endif; ?>
    </div>
    <div class="col-md-3">
        <p> <?=$advert->price ?> </p>
    </div>
    <div class="col-md-2">

        <?php $form = ActiveForm::begin([ 'action' => Url::to('/frontend/destroy')]) ?>
       <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::hiddenInput('id', $advert->id); ?>

            <?= Html::submitButton('Удалить', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
        <?php ActiveForm::end() ?>

    </div>
</div>

<?php endforeach; ?>



