<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Apertura */

$this->title = 'Create Apertura';
$this->params['breadcrumbs'][] = ['label' => 'Aperturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apertura-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
