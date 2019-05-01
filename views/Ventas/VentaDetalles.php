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
  <div class="form-block">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><i class="glyphicon glyphicon-envelope"></i>Detalle de facturacion</h4>
            <p>
                <?= Html::a('Nuevo Cliente', '#', [
                'id' => 'nuevo-cliente',
                'class' => 'btn btn-success',
                'data-toggle' => 'modal',
                'data-target' => '#modal',
                'data-url' => Url::to(['clientes/create']),
                'data-pjax' => '0',
            ]); ?>
            </p>

            <p>
            <?= Html::a('Nuevo Producto', '#', [
                'id' => 'agregar-producto',
                'class' => 'btn btn-success',
                'data-toggle' => 'modal2',
                'data-target' => '#modal2',
                'data-url2' => Url::to(['productos/create']),
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
                'data-url3' => Url::to(['productos/lista']),
                 //'data-url' => Url::to(['productos/create']),
                'data-pjax' => '0',
            ]); ?>
    </p>
        </p>
        </div>

</div>
<!-- aca tendria que ir la grilla para mostra el tema de los productoas agregados-->
<?php Pjax::begin() ?>
<div id="grid-pro">
<p>Detalle de la venta</p>
    
    <?php 
        if(isset($dataProvider))
        {
        echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        //['class' => 'yii\grid\SerialColumn'],

                        'idProducto',
                       // 'proveedor.razonSocial',
                        'detalle',
                        'p_u',
                        'iva',
                        //'stock',
                        //'marca',
                        //'modelo',
                        //'nroSerie',
                        
                       
                        //['class' => 'yii\grid\ActionColumn'],
                        /*
                         */
                        ['content'=>
                                function ($url, $model, $key) {
                                   $ruta = 'index.php?r=ventas/respuesta&id='.(++$key);
                                    return Html::a('', $ruta,
                                        [ 'class'=>'btn btn-success glyphicon glyphicon-plus',
                                        'title' => Yii::t('app', 'Listar'),
                                        'data-toggle' => 'modal3',
                                        'data-target' => '#modal3',
                                        //'data-url' => Url::to(['productos/index']),
                                        'data-pjax' => '0',
                                        ]);
                                }
                           
                                ],
                        
                    ],
                ]);
        }  else
            {
                echo 'No esta presente los datos';
            }
    ?>

 

</div>

<?php Pjax::end() ?>


<!-- inicio codigo que permite ejecutar el boton de nuevo cliente -->
<?php
$this->registerJs(
    "$(document).on('click', '#nuevo-cliente', (function() {
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
            $(this).data('url2'),
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
            $(this).data('url3'),
            function (data) {
                $('.modal-body').html(data);
                $('#modal3').modal();
            }
        );
    }));"
); ?>

<?php
Modal::begin([
    'id' => 'modal3',
    'header' => '<h4 class="modal-title">Agregar Productos a la venta</h4>',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>',
]);

echo "<div class='well'></div>";

Modal::end();
?>