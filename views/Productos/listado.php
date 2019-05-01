<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\modal;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="modal-ancho">
    
    <div class="productos-index">

        <h1><?= Html::encode($this->title) ?></h1>

           <?= GridView::widget([
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
        ]); ?>


    </div>
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