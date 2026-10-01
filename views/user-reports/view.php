<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\UserReports $model */

$this->title = $model->id_user_reports;
$this->params['breadcrumbs'][] = ['label' => 'User Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-reports-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_user_reports' => $model->id_user_reports], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_user_reports' => $model->id_user_reports], [
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
            'id_user_reports',
            'rental_request_id',
            'description_reports',
            'image_reports',
            'notes_reports',
        ],
    ]) ?>

</div>
