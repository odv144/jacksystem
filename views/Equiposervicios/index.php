<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equiposervicios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equiposervicios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Equiposervicios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idEquipo',
            'marca',
            'modelo',
            'imei',
            'sim:boolean',
            //'bateria:boolean',
            //'tarjetaMemoria:boolean',
            //'per:boolean',
            //'cla:boolean',
            //'mov:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
