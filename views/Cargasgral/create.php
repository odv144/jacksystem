<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cargasgral */

$this->title = 'Nuevo Registro de Carga';
$this->params['breadcrumbs'][] = ['label' => 'Cargas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cargasgral-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
