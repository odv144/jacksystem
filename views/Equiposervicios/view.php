<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Equiposervicios */

$this->title = $model->idEquipo;
$this->params['breadcrumbs'][] = ['label' => 'Equiposervicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="equiposervicios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idEquipo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idEquipo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idEquipo',
            'marca',
            'modelo',
            'imei',
            'sim:boolean',
            'bateria:boolean',
            'tarjetaMemoria:boolean',
            'per:boolean',
            'cla:boolean',
            'mov:boolean',
        ],
    ]) ?>

</div>
