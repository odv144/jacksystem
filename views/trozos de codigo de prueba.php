    ++++++++++++++++++++++++++++++++++++++++++++++++++
    codigo para establer relacion entre pagos y proveedores
    <?php
	echo "mostrando el contenido de una consulta compleja mediantes uso de pk";

    //echo 'probando'. $model->pagos['formaPago'];

     ?>
    <h1>El señor: <?= $model->razonSocial ?> con Correo electronico: <?= $model->email?> y condicion de iva: <?= $model->condicionIva?></h1>
    <h3>Pago su cuenta de saldo: <?= $dato[0]->deuda ?> de la siguiente forma: <?= $dato[0]->formaPago?></h3>
     <pre>	
      <?php// print_r($model); ?>
     <?php //print_r($dato); ?>
	</pre>
	<?php //echo $dato[0]->formaPago; ?>
    +++++++++++++++++++++++++++++++++++++++++++++++++++++