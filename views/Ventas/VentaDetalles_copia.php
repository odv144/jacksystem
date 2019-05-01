<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\bootstrap\modal;
use yii\helpers\url;
use yii\widgets\Pjax;
use app\models\Productos;

$x=0;
/* Sumar dos números. */

?>
<div class="row">
     <p>
        <?= Html::a('Nuevo Cliente', '#', [
            'id' => 'activity-index-link',
            'class' => 'btn btn-success',
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'data-url' => Url::to(['clientes/create']),
            'data-pjax' => '0',
        ]); ?>
    </p>
</div>
<div class="customer-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
        <div class="col-sm-6">
        <?php Pjax::Begin() ?>
            <?= $form->field($modelCustomer, 'idCliente')->dropDownlist($modCli)->label('Cliente') ?>
        <?php Pjax::End() ?>
        </div>
         <div class="col-sm-6">
            <?= $form->field($modelCustomer, 'idVendedor')->dropDownlist($modVen)->label('Vendedor') ?>
        </div>
       
         <div class="col-sm-6">
            <?= $form->field($modelCustomer, 'nroFactura')->textInput(['maxlength' => true]) ?>
        </div>
         <div class="col-sm-6">
            <?= $form->field($modelCustomer, 'totalVenta')->textInput(['maxlength' => true,'id'=>'Total']) ?>
        </div>
         <div class="col-sm-6">
            <?= $form->field($modelCustomer, 'descuesto')->textInput(['maxlength' => true]) ?>
        </div>
         <div class="col-sm-6">
            <?= $form->field($modelCustomer, 'FormaPago')->dropDownList(['EFECTIVO'=>'EFECTIVO','TARJETA'=>'TARJETA','CHEQUE'=>'CHEQUE']) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><i class="glyphicon glyphicon-envelope"></i>Detalle de facturacion</h4>
            <p>
            <?= Html::a('Nuevo Producto', '#', [
                'id' => 'agregar-producto',
                'class' => 'btn btn-success',
                'data-toggle' => 'modal2',
                'data-target' => '#modal2',
                'data-url' => Url::to(['productos/create']),
                'data-pjax' => '0',
            ]); ?>
    </p>
        <p>
             <p>
            <?= Html::a('Agregar Producto', '#', [
                'id' => 'venta-producto',
                'class' => 'btn btn-success',
                'data-toggle' => 'modal3',
                'data-target' => '#modal3',
                'data-url' => Url::to(['productos/lista']),
                'data-pjax' => '0',
            ]); ?>
    </p>
        </p>
        </div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 10, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsAddress[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'idVenta',
                    'idProducto',
                    'cantidad',
                    'p_u',
                    'iva',
                    'nroFactura',
                   
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsAddress as $i => $modelAddress): ?>
            
                        
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                     <!--   <h3 class="panel-title pull-left">Address</h3> -->
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                           
                            // necessary for update action.
                            if (! $modelAddress->isNewRecord) {
                                echo Html::activeHiddenInput($modelAddress, "[{$i}]id");
                            }
                        ?>

                        <div class="row">
                            <div class="col-sm-3">
                            <?= $form->field($modelAddress, "[{$i}]idProducto")->dropDownlist( ArrayHelper::map(Productos::find()->all(), 'idProducto', 'detalle'),
                                 ['prompt'=>'Seleccione Producto',
                                   /*
                                    'onchange'=> 'pruebas($(this).val());
                                    $.post( "'. Url::toRoute('productos/listas&id=1').'")
                                        function() {
                                            $( "#prueba" ).attr("value","putao");
                                    };
                                   */
                                  'onchange' =>'    
                                   $.post( "'. Url::toRoute('productos/listas').'", function() {
                                      $( "#prueba" ).attr("value","otra cosa");
                                    });
                                   
                                    '
                                ]); ?>
                               
                        <input type="text" id="prueba" value="dato">
                          </div>
                            <div class="col-sm-3 can">
                                <?= $form->field($modelAddress, "[{$i}]cantidad")->textInput(['maxlength' => true,'onchange'=>'calculo(this.value)']) ?>
                            </div>
                          <div class="col-sm-3 p_u">
                                <?= $form->field($modelAddress, "[{$i}]p_u")->textInput(['onchange'=>'calculo(this.value)']) ?>
                          </div>
                          <div class="col-sm-3 iva">
                                <?= $form->field($modelAddress, "[{$i}]iva")->textInput(['readonly'=>'readonly']) ?>
                          </div>
                           <?= $form->field($modelAddress,"[{$i}]nroFactura")->hiddenInput(['value'=>'000-00034'])?>
                        </div><!-- .row -->
                       <!-- .row -->
                    </div>
                </div>

            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($modelAddress->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
       
    </div>

    <?php ActiveForm::end(); ?>


</div>
<!-- inicio codigo que permite ejecutar el boton de nuevo cliente -->
<?php
$this->registerJs(
    "$(document).on('click', '#activity-index-link', (function() {
        $.get(
            $(this).data('url'),
            function (data) {
                $('.modal-body').html(data);
                $('#modal').modal();
            }
        );
    }));"
); ?>

<?php
Modal::begin([
    'id' => 'modal',
    'header' => '<h4 class="modal-title">Crear un Nuevo Cliente</h4>',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>',
]);

echo "<div class='well'></div>";

Modal::end();
?>
<!-- fin codigo que permite ejecutar el boton de nuevo cliente -->
<!-- inicio codigo manejo boton de agregaro un producto -->
<?php
$this->registerJs(
    "$(document).on('click', '#agregar-producto', (function() {
        $.get(
            $(this).data('url'),
            function (data) {
                $('.modal-body').html(data);
                $('#modal2').modal();
            }
        );
    }));"
); ?>

<?php
Modal::begin([
    'id' => 'modal2',
    'header' => '<h4 class="modal-title">Agregar Producto</h4>',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>',
]);

echo "<div class='well'></div>";

Modal::end();
?>
<!--fin de codigo de boton agregar producto -->
<!-- inicio codigo boton agregar producto a la venta -->
<?php
$this->registerJs(
    "$(document).on('click', '#venta-producto', (function() {
        $.get(
            $(this).data('url'),
            function (data) {
                $('.modal-body').html(data);
                $('#modal').modal();
            }
        );
    }));"
); ?>

<?php
Modal::begin([
    'id' => 'modal3',
    'header' => '<h4 class="modal-title">Crear un Nuevo Cliente</h4>',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>',
]);

echo "<div class='well'></div>";

Modal::end();
?>