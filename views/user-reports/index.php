<?php

use app\models\UserReports;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UserReportsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'User Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-reports-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Reports', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_user_reports',
            'rental_request_id',
            'description_reports',
            'image_reports',
            'notes_reports',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, UserReports $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_user_reports' => $model->id_user_reports]);
                 }
            ],
        ],
    ]); ?>


</div>
