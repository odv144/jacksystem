<?php 
	echo "<h1>Estoy en consultas para mostrar clientes con su equipo y estad ode servicio</h1>";

 ?>
 <h3>El Señor: <?= $model->nombre .' '.$model->apellido ?> </h3>
 <h4>Con el equipo id nro: <?= $model->sertecs[0]->idServicio; ?> en estado <?= $model->sertecs[0]->estado; ?></h4> y trabajo realizado <?= $model->sertecs[0]->detalle; ?> con un valor total de: $ <?= $model->sertecs[0]->monto; ?>
<h2>Correspondiente al equipo Modelo <?= $model->sertecs[0]->equipo->modelo; ?></h2>
 <pre>
 	<?php 
 		print_r($model);
 		print_r($model->sertecs);
 		print_r($model->sertecs[0]->equipo);
 	?>

 </pre>