<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserReports $model */

$this->title = 'Update User Reports: ' . $model->id_user_reports;
$this->params['breadcrumbs'][] = ['label' => 'User Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_user_reports, 'url' => ['view', 'id_user_reports' => $model->id_user_reports]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-reports-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
