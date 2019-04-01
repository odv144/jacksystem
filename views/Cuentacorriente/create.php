<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cuentacorriente */

$this->title = 'Nuevas Cuentas Corrientes';
$this->params['breadcrumbs'][] = ['label' => 'Cuenta Corrientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuentacorriente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model,'modCli'=>$modCli,'datos'=>$datos
    ]) ?>

</div>
