<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CarBrands $model */

$this->title = 'Update Car Brands: ' . $model->id_car_brands;
$this->params['breadcrumbs'][] = ['label' => 'Car Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_car_brands, 'url' => ['view', 'id_car_brands' => $model->id_car_brands]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="car-brands-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
