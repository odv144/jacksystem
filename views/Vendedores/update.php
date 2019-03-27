<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vendedores */

$this->title = 'Update Vendedores: ' . $model->idVendedor;
$this->params['breadcrumbs'][] = ['label' => 'Vendedores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idVendedor, 'url' => ['view', 'id' => $model->idVendedor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vendedores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
