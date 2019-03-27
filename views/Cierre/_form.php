<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cierre */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cierre-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tiempoCierre')->textInput() ?>

    <?= $form->field($model, 'montoFinal')->textInput() ?>

    <?= $form->field($model, 'obs')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
