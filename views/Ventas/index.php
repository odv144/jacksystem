<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ventas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ventas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ventas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'venta.producto.detalle',//idVenta',
            'cliente.nombre',
            'cliente.apellido',
            //'vendedor.nombre', //determina el nombre y apellido del vendedor
            //'idDetVenta',
            'nroFactura',
            'totalVenta',
            'descuesto',
            'FormaPago',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
