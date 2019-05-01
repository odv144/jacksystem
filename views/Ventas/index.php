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
            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view}{update}{delete}',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                            'id' => 'activity-index-link',
                            'title' => Yii::t('app', 'Update'),
                            'data-toggle' => 'modal',
                            'data-target' => '#modal',
                            //'data-url' => Url::to(['update', 'id' => $model->id]),
                            'data-pjax' => '0',
                        ]);
                    },
                ]
             ],
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

