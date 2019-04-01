<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Cuentacorriente */
/* @var $form yii\widgets\ActiveForm */

//echo $model->cliente[0]->apellido.' '.$model->cliente[0]->nombre;

    $listData = ArrayHelper::map($datos,'idCliente','nombre');
    $listData2 =ArrayHelper::map($datos,'idCliente','apellido');
    
    $ambos[0]='SELECCIONE CLIENTE';
    foreach ($listData as $key => $value) 
    {
        $agregado = strtoupper($value.' '.$listData2[$key]);
        array_push($ambos,$agregado);
        
    }
    
?>
<div class="cuentacorriente-form form-inline">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idCliente')->dropDownList($ambos) ?>

    <?= $form->field($model, 'nroFactura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaMov')->textInput() ?>

    <?= $form->field($model, 'entrega')->textInput() ?>

    <?= $form->field($model, 'deuda')->textInput() ?>

    <?= $form->field($model, 'saldo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
