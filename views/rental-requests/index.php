<?php

use app\models\RentalRequests;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RentalRequestsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Rental Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rental-requests-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Rental Requests', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_rental_requests',
            'user_id',
            'car_id',
            'start_date',
            'day_count',
            //'day_price',
            //'discount',
            //'status',
            //'notes',
            //'created_requests',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RentalRequests $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_rental_requests' => $model->id_rental_requests]);
                 }
            ],
        ],
    ]); ?>


</div>
