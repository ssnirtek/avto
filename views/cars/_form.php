<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Cars $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cars-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'brands_id')->textInput() ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_class_id')->textInput() ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'number_car')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color_car')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'day_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_free')->textInput() ?>

    <?= $form->field($model, 'description_car')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image_car')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
