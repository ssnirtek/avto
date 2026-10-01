<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Cars $model */

$this->title = $model->id_cars;
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cars-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_cars' => $model->id_cars], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_cars' => $model->id_cars], [
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
            'id_cars',
            'brands_id',
            'model',
            'car_class_id',
            'year',
            'number_car',
            'color_car',
            'day_price',
            'is_free',
            'description_car',
            'image_car',
        ],
    ]) ?>

</div>
