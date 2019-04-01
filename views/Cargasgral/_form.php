<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cargasgral */
/* @var $form yii\widgets\ActiveForm */
?>

<div class='form-inline'>

    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'fecha')->textInput(['value'=>date('Y-m-d H:i:s'),'readonly'=>'readonly']) ?>

    <?= $form->field($model, 'detalle')->dropdownlist(['Virtual Ex Claro'=>'Virtual Ex Claro','Carga Express'=>'Carga Express','Saldo Virtual'=>'Saldo Virtual']) ?>

    <?= $form->field($model, 'totalDiario')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
   
</div>
