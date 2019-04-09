<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
<?php 
		 echo '<pre>';
       print_r($model);
        
       // print_r($model->nro);
        echo '</pre>';
 foreach ($model['nro'] as $key => $value) {
 	echo "Cantidad: ".$value.' '.$model['descripcion'][$key].' '.$model['p_u'][$key]. ' '. $model['SubTotal'][$key].'<br>';
 }
 ?>

	
</body>
</html>