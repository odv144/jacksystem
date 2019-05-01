<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Clientes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<p>
    <?= Html::a('Cliente Nuevo', '#', [
            'id' => 'activity-index-link',
            'class' => 'btn btn-success',
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'data-url' => Url::to(['create']),
            'data-pjax' => '0',
        ]); ?>
</p>
<?php Pjax::begin() ?>
    <?= GridView::widget([
        'id'=>'cliente-grid',
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'idCliente',
            'dni',
            'apellido',
            'nombre',
            'domicilio',
            'localidad',
            'telfijo',
            'telmovil',
            'email:email',
            //'cuit',
            //'condicionIva',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<?php Pjax::end() ?>
</div>
<?php
$this->registerJs(
    "$(document).on('click', '#activity-index-link', (function() {
        $.get(
            $(this).data('url'),
            function (data) {
                $('.modal-body').html(data);
                $('#modal').modal();
            }
        );
    }));"
); ?>
 
<?php
Modal::begin([
    'id' => 'modal',
    'header' => '<h4 class="modal-title">Complete</h4>',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>',
]);
 
echo "<div class='well'></div>";
 
Modal::end();
?>