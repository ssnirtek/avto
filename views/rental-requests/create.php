<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RentalRequests $model */

$this->title = 'Create Rental Requests';
$this->params['breadcrumbs'][] = ['label' => 'Rental Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rental-requests-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
