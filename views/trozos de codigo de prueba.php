    <?php  
    //++++++++++++++++++++++++++++++++++++++++++++++++++
    //codigo para establer relacion entre pagos y proveedores
    
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
    <?php
    //+++++++++++++++++++++++++++++++++++++++++++++++++++++
       date_default_timezone_set('America/Argentina/Buenos_Aires'); //metodos para corregir la fecha y hora para asiganar
            echo date("Y-m-d H:i:s");
    //Esto se puede evitar si se agregar la clave 'timeZone'=>'America/Argentina/Buenos_Aires' en el archivo config->web.php

    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++
    forma de cargar un dropdown con los datos de una tabla
    */
    $city = \app\models\City::find()->all(); 
        $listData=ArrayHelper::map($city,'cityId','cityName'); 
        echo $form->field($model, 'cityId')->dropDownList($listData,['prompt'=>'Choose...']);
   // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     
    //PERMITE GENERAR UN DROPDOWNLIST  TOMANDO LOS DATOS DE UNA TABLA Y UNIR DOS CAMPOS
    $listData = ArrayHelper::map($datos,'idCliente','nombre');
    $listData2 =ArrayHelper::map($datos,'idCliente','apellido');
    
    $ambos[0]='SELECCIONE CLIENTE';
    foreach ($listData as $key => $value) 
    {
        $agregado = strtoupper($value.' '.$listData2[$key]);
        array_push($ambos,$agregado);
        
    }
    
    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    


    ?>



    <div class="productos-index">
    
        <h1><?= Html::encode($this->title) ?></h1>

           <?= GridView::widget([
            'id'=>'productos',
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
               
                [
                    'class' => 'yii\grid\CheckboxColumn',
                        'header'=>'Seleccion',    
                        'name'=>'proSelec',                    
                    // you may configure additional properties here
                ],

               
                //['class' => 'yii\grid\CheckboxColumn'],
                /*
                 */
                /*
                ['content'=>
                        function ($url, $model, $key) {
                           //$ruta = 'index.php?r=ventas/respuesta&id='.(++$key);
                          
                            return Html::button('<i class=" glyphicon glyphicon-plus"></i>Agregar', [//$ruta,
                                'class'=>'btn btn-success', 'onclick'=>'
                                var mio =  $("#grid-pro").attr("data-reg");
                                var keys = $("#productos").yiiGridView("getSelectedRows");
                              
                                alert((mio));
                                //var obj = {};
                                //obj.id = '.($key+1).';
                                //var jmio = JSON.stringify(obj);
                                 var jmio = mio;
                                    
                                 $.get("'.Url::toRoute('productos/rta2').'",{"id":'.($key+1).', "mio" : jmio})
                                .done(function(data){
                                     $("#grid-pro").html(data);});'
                               // 'title' => Yii::t('app', 'Listar'),
                               // 'data-toggle' => 'agre-pro',
                                //'data-target' => '#agre-pro',
                                //'data-url' => Url::to(['productos/index']),
                               //'data-url'=> Url::to(['productos/rta','id'=>$key]),
                                //'data-pjax' => '0',
                               //'onclick' => 'ayuda2('. $key.','.$model.')',
                               //'onclick' => 'ayuda('. $key.','.$model.')', //para funcionaar debe estar descomentado esta linea
                                ]);
                         
                        }
                   
                        ],
                */
                    /*otro boton
                 ['content'=>
                        function ($url, $model, $key) {
                           //$ruta = 'index.php?r=ventas/respuesta&id='.(++$key);
                          
                            return Html::a('', '#',//$ruta,
                                [ 'class'=>'btn btn-primary glyphicon glyphicon-plus cargar',
                                'id'=>'boton-1',
                                'header'=>'Aregar',
                                'title' => Yii::t('app', 'Listar'),
                               // 'data-toggle' => 'agre-pro',
                                //'data-target' => '#agre-pro',
                                //'data-url' => Url::to(['productos/index']),
                               'data-url'=> Url::to(['productos/cargar','id'=>$key]),
                                //'data-pjax' => '0',
                               //'onclick' => 'ayuda('. $key.','.$model.')', //para funcionaar debe estar descomentado esta linea
                                ]);
                         
                        }
                   
                        ],
                    */
                
            ],
        ]); ?>


    </div>