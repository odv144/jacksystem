<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Apertura */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apertura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tiempoApertura')->textInput() ?>

    <?= $form->field($model, 'montoInicial')->textInput() ?>

    <?= $form->field($model, 'obs')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
