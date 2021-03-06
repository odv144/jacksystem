<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pagos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pagos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idPago',
            'fecha',
            /*
            ['header'=>'Proveedor',
            'value'=>function ($date){
                return $date->proveedor->razonSocial;
            }],
            */
            //'proveedor.razonSocial',
            //['value'=>'proveedor.razonSocial',
            //'header'=>'Proveedor','headerOptions'=>['ahref'=>"/pagos/index&sort=proveedor",'data-sort'=>'proveedor']],
            'entrega',
            'deuda',
            'saldo',
            'formaPago',
            'nroFacCompra',

            ['class' => 'yii\grid\ActionColumn'],
            
        ],
    ]); ?>


</div>
