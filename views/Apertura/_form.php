<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Apertura */
/* @var $form yii\widgets\ActiveForm */
?>
<?php 

//echo date('Y-m-d H:i:s'); ?>
<div class="apertura-form form-inline">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tiempoApertura')->textInput(['value' =>
      date('Y-m-d H:i:s'), 'disable'=>'disable']) ?>

    <?= $form->field($model, 'montoInicial')->textInput() ?>

    <?= $form->field($model, 'obs')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
