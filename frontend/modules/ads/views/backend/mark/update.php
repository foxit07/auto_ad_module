<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\ads\models\entity\mark\Mark */

$this->title = 'Update Mark: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Marks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mark-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
