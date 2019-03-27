<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aperturas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apertura-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Apertura', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idFecha',
            'tiempoApertura',
            'montoInicial',
            'obs',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
