<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CarClasses $model */

$this->title = 'Create Car Classes';
$this->params['breadcrumbs'][] = ['label' => 'Car Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-classes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
