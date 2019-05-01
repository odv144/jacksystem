<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clientes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clientes-form form-inline">

    <?php $form = ActiveForm::begin([
        'id' => 'cliente-form',
        'enableAjaxValidation' => true,
        'enableClientScript' => true,
        'enableClientValidation' => true,
    ]); ?>
    
   <?php
$this->registerJs('
    // obtener la id del formulario y establecer el manejador de eventos
        $("form#cliente-form").on("beforeSubmit", function(e) {
            var form = $(this);
            $.post(
                form.attr("action")+"&submit=true",
                form.serialize()
            )
            .done(function(result) {
                form.parent().html(result.message);
                $.pjax.reload({container:"#ventas-idcliente"});
            });
            return false;
        }).on("submit", function(e){
            e.preventDefault();
            //e.stopImmediatePropagation();
            return false;
        });
    ');
?>
   
    <?= $form->field($model, 'dni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'domicilio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'localidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telfijo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telmovil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cuit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'condicionIva')->textInput(['maxlength' => true]) ?>

    <div class="form-block">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

