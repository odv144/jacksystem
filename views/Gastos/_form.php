<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Gastos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gastos-form form-inline">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->textInput(['value'=>date('Y-m-d H:i:s'),'readonly'=>'readonly']) ?>

    <?= $form->field($model, 'detalle')->textInput(['maxlength' => true,'width'=>'33%']) ?>

    <?= $form->field($model, 'monto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
