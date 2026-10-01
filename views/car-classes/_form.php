<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CarClasses $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="car-classes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_car_classes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discount_car_classes')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
