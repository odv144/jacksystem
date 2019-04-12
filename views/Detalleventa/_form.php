<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleVenta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalle-venta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idProducto')->textInput() ?>

    <?= $form->field($model, 'idVenta')->textInput() ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'p_u')->textInput() ?>

    <?= $form->field($model, 'iva')->textInput() ?>

    <?= $form->field($model, 'nroFactura')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
