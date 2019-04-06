<?php 
	use yii\helpers\Url;
	use yii\helpers\Html;
// Estoy utilizando $model para el modelo de Servicio, $modCli para modelo del Cliente y $modEqui pra modelo del Equipo					
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Informe para Ventas Diarias</title>
	<link rel="stylesheet" href="">
</head>
<body>

	<div class="linea">
		  <div class="columna-izq">
			<?= Html::img(Url::to('/img/logo.jpg'), ['alt' => 'My logo','width'=>'350']) ?>
			<h3>CEL ACCESSORIOS	</h3>
			<H6>Belgrano 1424</H6>
			<h6>Villa Ocampo- Santa Fe</h6>
			<h6>Tel: 3482-468849</h6>
			<h6>Cel: 3482-674306</h6>
		  </div>
		  <div class="columna-izq">
		  	<h6>Documento no valido como Factura</h6>
		  	<h5>Orden de Servicio Tecnico</h5>
		  	<h5>Fecha: <?= date('d-m-Y H:i')?></h5>

		  </div>
	</div>
	<div class="linea">
		
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit commodi eos deleniti recusandae ipsam illo consectetur eveniet, ratione maxime repellat.</p>
		
	</div>
			<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
	<section class='linea'>
		
		<div class="col-xs-4 col-md-4 linea">
			<p><?= 'Cliente: '.$modCli->apellido .' '.$modCli->nombre ?></p>
			<p><?= 'Telefonos de Contacto: Fijo '.$modCli->telfijo .' Celular: '.$modCli->telmovil ?></p>
		</div>

		 <div class="col-xs-4 col-md-4 linea">
		  <h3>Datos del Equipo ingresado para reparación</h3>
			<p><?= 'Marca: '.$modEqui->marca.' Modelo: '.$modEqui->modelo ?></p>
			<p><?= 'Imei: '.$modEqui->imei. ' Empresa: Este  faltante '?></p>
			<p><?= ($modEqui->sim)?'Tarjeta Sim: Si':'Tarjeta Sim: No' ?></p>
			<p><?= ($modEqui->bateria)?'Bateria: Si':'Bateria: No' ?></p>
			<p><?= ($modEqui->tarjetaMemoria)?'Tarjeta Memoria: Si':'Tarjeta Memoria: No' ?></p>
			<p><?= 'Desperfecto del equipo determinado por el cliente: '.$model->detalle?></p>
			
		 </div>
		
		<div class="col-xs-12 col-md-12 linea">

			<h2>PRESUPUESTOS-GARANTIAS-RECARGOS</h2>
		  <p>Para hacer uso de la garantía deberá presentar la correspondiente orden de servicio o factura de compra. La validez de la misma queda sujeta a verificación final del equipo cuando se efectúa la reparación.</p>
		  <p>Las reparaciones tienen una garantía de 90 días a partir de la fecha que fue retirado dicho producto. La garant+ia "SOLO" es válida en los casos de fallas relacionadas a la reparación realizada o en defectos de fabricación de dicho repuesto.</p>
		  <p>Los presupuestos tienen una validez de 15 días, los mismos pueden sufir modificación luego de este lapso sin previo aviso.</p>
		  	<p>Los precios de las reparaciones son de CONTADO.</p>
		  	<p>Transcurridos los 30 días de la fecha deel presente y estando el producto o equipo a su disposición, facturaremos recargos por almacenaje.</p>
		  <p>Si el producto NO fuera retirado dentro del plazo de 90 días de la fecha de la presente, será considerado ABANDONADO en los términos de los artículos 2525 y 2526 del código civil, quedando facultados a darle el destino que consideremos pertinente.</p>
		  <p><h4>PARARETIRAR EL EQUIPO ES IMPRESINDIBLE PRESENTAR ESTE COMPROBANTE</h4></p>
		<br>
		<br>
		<div class="row linea">
				
		  <div class="col-sm-6">
		  		<p>.............................</p>
		  		<p>JACK Cel Accesorios</p>
		  </div>
			<div class="col-sm-6">
		  		<p>.............................</p>
		  		<p>Cliente</p>
		  </div>
		  <p><h2>PRESUPUESTO:$......................APROBADO:..............</h2></p>

		</div>
	</section>
	
		

		<!-- Columns are always 50% wide, on mobile and desktop -->
		<div class="row">
		  <div class="col-xs-6">.col-xs-6</div>
		  <div class="col-xs-6">.col-xs-6</div>
		</div>
</body>
</html>