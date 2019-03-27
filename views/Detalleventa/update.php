<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleVenta */

$this->title = 'Update Detalle Venta: ' . $model->idDetVenta;
$this->params['breadcrumbs'][] = ['label' => 'Detalle Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDetVenta, 'url' => ['view', 'id' => $model->idDetVenta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detalle-venta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
