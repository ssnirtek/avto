<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CarClasses $model */

$this->title = 'Update Car Classes: ' . $model->id_car_classes;
$this->params['breadcrumbs'][] = ['label' => 'Car Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_car_classes, 'url' => ['view', 'id_car_classes' => $model->id_car_classes]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="car-classes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
