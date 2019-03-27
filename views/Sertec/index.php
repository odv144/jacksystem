<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sertecs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sertec-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sertec', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idServicio',
            'idCliente',
            'idEquipo',
            'detalle',
            'estado',
            //'usoRepuesto',
            //'monto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
