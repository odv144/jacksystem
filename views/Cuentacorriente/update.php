<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cuentacorriente */

$this->title = 'Update Cuentacorriente: ' . $model->idCtaCte;
$this->params['breadcrumbs'][] = ['label' => 'Cuentacorrientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCtaCte, 'url' => ['view', 'id' => $model->idCtaCte]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cuentacorriente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
