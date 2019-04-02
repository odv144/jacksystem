<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Servicio Tecnico';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sertec-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear nuevo servicio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'idServicio',
            //'idCliente',
            'cliente.nombre',
            'cliente.apellido',
            //'idEquipo',
            'equipo.modelo',
            'equipo.marca',
            'detalle',
            'estado',
            //'usoRepuesto',
            //'monto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
