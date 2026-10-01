<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\RentalRequests $model */

$this->title = $model->id_rental_requests;
$this->params['breadcrumbs'][] = ['label' => 'Rental Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rental-requests-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_rental_requests' => $model->id_rental_requests], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_rental_requests' => $model->id_rental_requests], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_rental_requests',
            'user_id',
            'car_id',
            'start_date',
            'day_count',
            'day_price',
            'discount',
            'status',
            'notes',
            'created_requests',
        ],
    ]) ?>

</div>
