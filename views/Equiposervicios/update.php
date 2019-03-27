<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Equiposervicios */

$this->title = 'Update Equiposervicios: ' . $model->idEquipo;
$this->params['breadcrumbs'][] = ['label' => 'Equiposervicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEquipo, 'url' => ['view', 'id' => $model->idEquipo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="equiposervicios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
