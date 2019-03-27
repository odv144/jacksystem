<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cargasgral */

$this->title = 'Update Cargasgral: ' . $model->idCarga;
$this->params['breadcrumbs'][] = ['label' => 'Cargasgrals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCarga, 'url' => ['view', 'id' => $model->idCarga]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cargasgral-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
