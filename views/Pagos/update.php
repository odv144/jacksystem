<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pagos */

$this->title = 'Update Pagos: ' . $model->idPago;
$this->params['breadcrumbs'][] = ['label' => 'Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPago, 'url' => ['view', 'id' => $model->idPago]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pagos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'modPro'=>$modPro,'datos'=>$datos,
    ]) ?>

</div>
