<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detalle Ventas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle-venta-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Detalle Venta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idDetVenta',
            'idProducto',
            'cantidad',
            'p_u',
            'iva',
            //'nroFactura',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
