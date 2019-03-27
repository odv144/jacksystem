<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Equiposervicios */

$this->title = 'Create Equiposervicios';
$this->params['breadcrumbs'][] = ['label' => 'Equiposervicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equiposervicios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
