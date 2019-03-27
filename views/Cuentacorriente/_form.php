<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cuentacorriente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuentacorriente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idCliente')->textInput() ?>

    <?= $form->field($model, 'nroFactura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaMov')->textInput() ?>

    <?= $form->field($model, 'entrega')->textInput() ?>

    <?= $form->field($model, 'deuda')->textInput() ?>

    <?= $form->field($model, 'saldo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
