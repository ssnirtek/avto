<?php

use app\models\CarClasses;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CarClassesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Car Classes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-classes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Car Classes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_car_classes',
            'name_car_classes',
            'discount_car_classes',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CarClasses $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_car_classes' => $model->id_car_classes]);
                 }
            ],
        ],
    ]); ?>


</div>
