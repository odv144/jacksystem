<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$form = ActiveForm::begin([
        'id' => 'venta-form',
        'enableAjaxValidation' => true,
        'enableClientScript' => true,
        'enableClientValidation' => true,
    ]); ?>
    


   
    <?= $form->field($model, 'dni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido')->dropDownList(['EFECTIVO'=>'EFECTIVO','TARJETA'=>'TARJETA','CHEQUE'=>'CHEQUE']) ?>

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


<?php
$urlSetcover = Url::to(['ventas/llamada']);

$this->registerJs('

$("#clientes-apellido).on("evento", function(e) { 
   
    $.ajax({
        url:"'.$urlSetcover.'",
        type:"post",
        dataType: "json",
        data: {
            id:this.id
        }

    })
    .done(function(response) {
                if (response.data.success == true) {
                    // llenar los fields
                    console.log(response.data.model.attribute);
                }
            })
            .fail(function() {
                console.log("error");
            });
});

');
?>