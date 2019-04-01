<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
Yii::$app->name="Jack Sistemas";
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label'=> 'Proveedores',
                'items'=>[
                        ['label'=>'Inicio','url'=>['proveedores/index']],
                        ['label'=>'Prueba','url'=>['proveedores/prueba']],
                ],
            ],

            ['label' =>'Pagos',
                'items'=>[
                    ['label'=>'Inicio','url'=>['/pagos/index']],
                    ['label'=>'Listar','url'=>['/pagos/view','id'=>1]],
                    ['label'=>'Actualizar','url'=>['/pagos/update','id'=>1]],
                    ['label'=>'Borrar','url'=>['/pagos/delete']],
                    ],
            ],
            ['label' =>'Clientes',
                'items'=>[
                    ['label'=>'Inicio','url'=>['/clientes/index']],
                    ['label'=>'Prueba de consultas','url'=>['/clientes/prueba']],
                    ['label'=>'Listar','url'=>['/clientes/view','id'=>1]],
                    ['label'=>'Actualizar','url'=>['/clientes/update','id'=>1]],
                    ['label'=>'Borrar','url'=>['/clientes/delete']],
                    ['label'=>'Servio Tecnico','url'=>['/sertec/index']],
                    ['label'=>'Equipos','url'=>['/equiposervicios/index']],
                    ],
            ],

            ['label' =>'apertura',
                'items'=>[
                    ['label'=>'Inicio','url'=>['/apertura/index']],
                    ['label'=>'Listar','url'=>['/apertura/view','id'=>1]],
                    ['label'=>'Actualizar','url'=>['/apertura/update','id'=>1]],
                    ['label'=>'Borrar','url'=>['/apertura/delete']],
                    ],
            ],
            ['label' =>'Cargas',
                'items'=>[
                    ['label'=>'Inicio','url'=>['/cargasgral/index']],
                    ['label'=>'Listar','url'=>['/cargasgral/view','id'=>1]],
                    ['label'=>'Actualizar','url'=>['/cargasgral/update','id'=>1]],
                    ['label'=>'Borrar','url'=>['/cargasgral/delete']],
                    ],
            ],


           
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
