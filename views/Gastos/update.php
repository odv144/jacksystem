<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gastos */

$this->title = 'Update Gastos: ' . $model->idGasto;
$this->params['breadcrumbs'][] = ['label' => 'Gastos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idGasto, 'url' => ['view', 'id' => $model->idGasto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gastos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
