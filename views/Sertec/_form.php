<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Sertec */
/* @var $form yii\widgets\ActiveForm */
$listaCli=ArrayHelper::map($cli,'idCliente','nombre');
$listaCli2 =ArrayHelper::map($cli,'idCliente','apellido');
    
    $ambos[0]='SELECCIONE CLIENTE';
    foreach ($listaCli as $key => $value) 
    {
        $agregado = strtoupper($value.' '.$listaCli2[$key]);
        array_push($ambos,$agregado);
        
    }
$listaEqui = ArrayHelper::map($equi,'idEquipo','marca');
$listaEqui2 =ArrayHelper::map($equi,'idEquipo','modelo');

    $equipo[0]='Seleccion el Equipo';
    foreach ($listaEqui as $key => $value) 
    {
        $agregado = strtoupper($value.' '.$listaEqui2[$key]);
        array_push($equipo,$agregado);
        
    }
    
?>

<div class="sertec-form form-inline">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idCliente')->dropdownlist($ambos)->label('Cliente') ?>

    <?= $form->field($model, 'idEquipo')->dropdownList($equipo)->label('Equipo') ?>

    <?= $form->field($model, 'detalle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->dropdownlist(['TERMINADO'=>'TERMINADO','REVISANDO'=>'REVISANDO','EN ESPERA DE RESPUESTO'=>'EN ESPERA DE RESPUESTO','POR INGRESAR'=>'POR INGRESAR']) ?>

    <?= $form->field($model, 'usoRepuesto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'monto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
