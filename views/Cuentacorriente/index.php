<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cuentacorrientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuentacorriente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cuentacorriente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idCtaCte',
            'idCliente',
            'nroFactura',
            'fechaMov',
            'entrega',
            //'deuda',
            //'saldo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
