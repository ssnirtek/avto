<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserReportsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-reports-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_user_reports') ?>

    <?= $form->field($model, 'rental_request_id') ?>

    <?= $form->field($model, 'description_reports') ?>

    <?= $form->field($model, 'image_reports') ?>

    <?= $form->field($model, 'notes_reports') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
