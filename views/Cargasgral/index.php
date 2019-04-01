<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cargas Generales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cargasgral-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Cargas Generales', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'idCarga',
            'fecha',
            'detalle',
            'totalDiario',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
