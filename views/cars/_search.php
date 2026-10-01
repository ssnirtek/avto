<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CarsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cars-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cars') ?>

    <?= $form->field($model, 'brands_id') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'car_class_id') ?>

    <?= $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'number_car') ?>

    <?php // echo $form->field($model, 'color_car') ?>

    <?php // echo $form->field($model, 'day_price') ?>

    <?php // echo $form->field($model, 'is_free') ?>

    <?php // echo $form->field($model, 'description_car') ?>

    <?php // echo $form->field($model, 'image_car') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
