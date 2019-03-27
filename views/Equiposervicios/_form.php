<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Equiposervicios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equiposervicios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imei')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sim')->checkbox() ?>

    <?= $form->field($model, 'bateria')->checkbox() ?>

    <?= $form->field($model, 'tarjetaMemoria')->checkbox() ?>

    <?= $form->field($model, 'per')->checkbox() ?>

    <?= $form->field($model, 'cla')->checkbox() ?>

    <?= $form->field($model, 'mov')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
