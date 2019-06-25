<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\modal;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="modal-ancho">
  

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
     
     <p>
            <?= Html::a('Agregar', '#', [
                'id' => 'boton-3',
                'class' => 'btn btn-success','onclick'=>'
                           var keys = $("#productos").yiiGridView("getSelectedRows");
                          alert(keys);'
                           
                               
               
            ]); ?>
    </p>
</div>
<?php 


$this->registerJs('
    // obtener la id del formulario y establecer el manejador de eventos
        $("#grid-pro").on("beforeSubmit", function(e) {
            var form = $(this);
            $.post(
                form.attr("action")+"&submit=true",
                form.serialize()
            )
            .done(function(result) {
                form.parent().html(result.message);
                $.pjax.reload({container:"#grid-pro"});
            });
            return false;
        }).on("submit", function(e){
            e.preventDefault();
           // e.stopImmediatePropagation();
            return false;
        });
    ');
?>

