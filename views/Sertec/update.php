<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sertec */

$this->title = 'Update Sertec: ' . $model->idServicio;
$this->params['breadcrumbs'][] = ['label' => 'Sertecs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idServicio, 'url' => ['view', 'id' => $model->idServicio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sertec-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
