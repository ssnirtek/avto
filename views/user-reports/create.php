<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserReports $model */

$this->title = 'Create User Reports';
$this->params['breadcrumbs'][] = ['label' => 'User Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-reports-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
