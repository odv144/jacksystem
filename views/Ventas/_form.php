<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ventas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ventas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idCliente')->textInput() ?>

    <?= $form->field($model, 'idVendedor')->textInput() ?>

    <?= $form->field($model, 'idDetVenta')->textInput() ?>

    <?= $form->field($model, 'nroFactura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'totalVenta')->textInput() ?>

    <?= $form->field($model, 'descuesto')->textInput() ?>

    <?= $form->field($model, 'FormaPago')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
