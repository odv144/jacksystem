<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\modal;
use yii\helpers\Json;
 ?>

<div id="grid-pro1"  >
  <h2>probando haber que muestra</h2>
  <h1>la idea es que aparzca primero esto</h1>
   <?php $form = ActiveForm::begin(); ?>
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
                
                [
                    'class' => 'yii\grid\CheckboxColumn',
                        'header'=>'Seleccion',    
                        'name'=>'proSelec',                    
                    // you may configure additional properties here
                ],

               
              
                
            ],
        ]); ?>

    <?= $form->field($model,'modelo')->hiddenInput()->label('') ?>
    
   

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<?php 
$urlSetcover = Url::to(['productos/prueba']);

$this->registerJs('

$("#productos").on("evento", function(e) { 
   
    $.ajax({
        url:"'.$urlSetcover.'",
        type:"post",
        dataType: "json",
        data: {
            id:this.id
        }

    })
    .done(function(response) {
                if (response.data.success == true) {
                    // llenar los fields
                    console.log(response.data.model.attribute);
                }
            })
            .fail(function() {
                console.log("error");
            });
});

');

?>

 