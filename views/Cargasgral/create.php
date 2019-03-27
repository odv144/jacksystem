<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cargasgral */

$this->title = 'Create Cargasgral';
$this->params['breadcrumbs'][] = ['label' => 'Cargasgrals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cargasgral-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
