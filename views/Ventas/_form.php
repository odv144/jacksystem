<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ventas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ventas-form form-inline">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idCliente')->dropDownList($modCli)->label('Clinte') ?>

    <?= $form->field($model, 'idVendedor')->dropDownList($modVendedor)->label('Vendedor') ?>

    <?= $form->field($model, 'idVenta')->textInput() ;?>
   
    <?= $form->field($model, 'nroFactura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'totalVenta')->textInput()?>

    <?= $form->field($model, 'descuesto')->textInput() ?>

    <?= $form->field($model, 'FormaPago')->dropDownList(['EFECTIVO'=>'EFECTIVO','TARJETA'=>'TARJETA','CHEQUE'=>'CHEQUE']) ?>

      <?php for ($x = 0 ;$x<5;$x++):?>
        <div class="row">
            
           <?= $form->field($model, 'nro')->textInput(['name'=>'nro[]','id'=>$x])->label('Cantidad');?>
           <?= $form->field($model, 'descripcion')->textInput(['name'=>'descripcion[]','id'=>$x])->label('Descripcion');?>
           <?= $form->field($model, 'p_u')->textInput(['name'=>'p_u[]','id'=>$x])->label('Precio Unitario');?>
           <?= $form->field($model, 'SubTotal')->textInput(['name'=>'SubTotal[]','id'=>$x])->label('SubTotal');?>
        </div>
           
    <?php endfor;?>

     

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

