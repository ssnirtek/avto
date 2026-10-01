<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserReports $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-reports-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rental_request_id')->textInput() ?>

    <?= $form->field($model, 'description_reports')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image_reports')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notes_reports')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
