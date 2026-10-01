<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CarBrands $model */

$this->title = 'Create Car Brands';
$this->params['breadcrumbs'][] = ['label' => 'Car Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-brands-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
