<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cierre */

$this->title = 'Update Cierre: ' . $model->idFecha;
$this->params['breadcrumbs'][] = ['label' => 'Cierres', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idFecha, 'url' => ['view', 'id' => $model->idFecha]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cierre-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
