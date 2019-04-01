<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Pagos */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $lista=ArrayHelper::map($datos,'idProveedor','razonSocial'); ?>
<div class="pagos-form form-inline">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->textInput(['value'=>date('Y-m-d H:i:s'),'readonly'=>'readonly']) ?>

    <?= $form->field($model, 'idProveedor')->dropDownList($lista)?>

    <?= $form->field($model, 'entrega')->textInput() ?>

    <?php
      echo $form->field($model, 'deuda')->textInput(); 

      //echo  $form->field($model, 'saldo')->textInput(); 
    ?>

    <?= $form->field($model, 'formaPago')->dropDownList(['EFCTIVO'=>'EFECTIVO','CHEQUE'=>'CHEQUE','TARJETA'=>'TARJETA']) ?>

    <?= $form->field($model, 'nroFacCompra')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
