<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Productos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'idProducto',
            'proveedor.razonSocial',
            'detalle',
            'p_u',
            'iva',
            //'stock',
            //'marca',
            //'modelo',
            //'nroSerie',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
