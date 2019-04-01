<?php
use yii\helpers\url;
/* @var $this yii\web\View */

//$this->title = 'Jack Sistema';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Menu principal para Jack</h1>

        <p class="lead">Seleccionando cualquiera de los botones sera remitido a sus funcionalidades</p>

    </div>

    <div class="body-content">
    <div class="row col-lg-12">
        
        <div class="col-lg-3">
            <a class="btn btn-lg btn-success" href=<?= Url::to(['apertura/create'])?> >Apertura de Caja</a>
        </div>
        <div class=" col-lg-3">
           <p><a class="btn btn-lg btn-success" href=<?=Url::to(['cierre/create'])?> >Cierre de Caja Diaria</a></p>
        </div>
        <div class="col-lg-3">
              <p><a class="btn btn-lg btn-success" href=<?= Url::to(['cargasgral/index'])?> >Cargas Generales </a></p>
        </div>
        <div class="col-lg-3">
           <p><a class="btn btn-lg btn-success" href=<?=Url::to(['clientes/index'])?> >Gestion de Clientes</a></p>
        </div>
        <div class=" col-lg-3">
            <p><a class="btn btn-lg btn-success" href=<?= Url::to(['cuentacorriente/index'])?> >Cuentas Corrientes</a></p>
        </div>
        <div class="col-lg-3">
             <p><a class="btn btn-lg btn-success" href=<?=Url::to(['detalleventa/index'])?> >Detalle de Venta</a></p>
        </div>
           
       <div class="col-lg-3"> 
            <p><a class="btn btn-lg btn-success" href=<?=Url::to(['equiposervicios/index'])?> >Equipos para Servicios</a></p>
        </div>
       <div class="col-lg-3">
            <p><a class="btn btn-lg btn-success" href=<?= Url::to(['gastos/index'])?> >Gestion de Gastos</a></p>
        </div>
       <div class="col-lg-3"> 
            <p><a class="btn btn-lg btn-success" href=<?=Url::to(['pagos/index'])?> >Gestion de Pagos</a></p>
        </div>
       <div class="col-lg-3"> 
            <p><a class="btn btn-lg btn-success" href=<?=Url::to(['prodctos/index'])?> >Productos para Venta</a></p>
        </div>
       <div class="col-lg-3">
            <p><a class="btn btn-lg btn-success" href=<?= Url::to(['proveedores/index'])?> >Proveedores</a></p>
        </div>
       <div class="col-lg-3"> 
            <p><a class="btn btn-lg btn-success" href=<?=Url::to(['sertec/index'])?> >Servicios Tecnico</a></p>
        </div>
        <div class="col-lg-3">
                <p><a class="btn btn-lg btn-success" href=<?=Url::to(['vendedores/index'])?> >Administrar Vendedores</a></p>
            </div>
        <div class="col-lg-3">
                <p><a class="btn btn-lg btn-success" href=<?= Url::to(['ventas/index'])?> >Gestion de Ventas</a></p>
            </div>
       <div class="col-lg-3"> 
            <p><a class="btn btn-lg btn-success" href=<?=Url::to(['clientes/prueba'])?> >Formularios de consltas de pruebas</a></p>
        </div>
      </div>


        

    </div>
</div>
