<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RentalRequests $model */

$this->title = 'Update Rental Requests: ' . $model->id_rental_requests;
$this->params['breadcrumbs'][] = ['label' => 'Rental Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_rental_requests, 'url' => ['view', 'id_rental_requests' => $model->id_rental_requests]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rental-requests-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
