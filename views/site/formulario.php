<?php 
	use yii\helpers\Url;
	use yii\helpers\Html;

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
	<div class="row">
		  <div class="col-md-6">
			<?= Html::img(Url::to('/img/logo.jpg'), ['alt' => 'My logo','width'=>'350']) ?>
			<h3>CEL ACCESSORIOS	</h3>
			<H6>Belgrano 1424</H6>
			<h6>Villa Ocampo- Santa Fe</h6>
			<h6>Tel: 3482-468849</h6>
			<h6>Cel: 3482-674306</h6>
		  </div>
		  <div class="col-md-6">
		  	<h6>Documento no valido como Factura</h6>
		  	<h5>Orden de Servicio Tecnico</h5>
		  	<h5>Fecha: <?= date('d-m-Y H:i')?></h5>

		  </div>
	</div>
	<div class="row">
			<div class="col-md-12">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit commodi eos deleniti recusandae ipsam illo consectetur eveniet, ratione maxime repellat.</p>
			</div>
	</div>
			<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
		<div class="row">
		  <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
		  <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
		  <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
		</div>

		<!-- Columns are always 50% wide, on mobile and desktop -->
		<div class="row">
		  <div class="col-xs-6">.col-xs-6</div>
		  <div class="col-xs-6">.col-xs-6</div>
		</div>
</body>
</html>