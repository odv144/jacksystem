<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pagos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pagos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'idProveedor')->textInput() ?>

    <?= $form->field($model, 'entrega')->textInput() ?>

    <?= $form->field($model, 'deuda')->textInput() ?>

    <?= $form->field($model, 'saldo')->textInput() ?>

    <?= $form->field($model, 'formaPago')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nroFacCompra')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
