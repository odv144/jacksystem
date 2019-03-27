<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cuentacorriente */

$this->title = 'Create Cuentacorriente';
$this->params['breadcrumbs'][] = ['label' => 'Cuentacorrientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuentacorriente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
