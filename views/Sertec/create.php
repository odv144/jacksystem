<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sertec */

$this->title = 'Create Sertec';
$this->params['breadcrumbs'][] = ['label' => 'Sertecs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sertec-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
