<?php

namespace app\controllers;

use Yii;
use app\models\Productos;
use app\models\Proveedores;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * ProductosController implements the CRUD actions for Productos model.
 */
class ProductosController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Productos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Productos::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Productos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Productos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Productos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idProducto]);
        }
        $modPro=new Proveedores();
        $datos  = $modPro->find()->all();
        return $this->render('create', [
            'model' => $model,'datos'=>$datos,
        ]);
    }

    /**
     * Updates an existing Productos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idProducto]);
        }
        $modPro=new Proveedores();
        $datos  = $modPro->find()->all();
        return $this->render('update', [
            'model' => $model,'datos'=>$datos,
        ]);
    }

    /**
     * Deletes an existing Productos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    /****************************************************************************************/
        public function actionLista()
        {
            /*
            $totalProducto = Productos::find()
                    ->where(['idProducto' => $id])
                    ->orderBy('idProducto DESC')
                    ->one();
            $canPro =  Productos::find()
                    ->where(['idProducto' => $id])
                    ->cont();

            if($canPro>0){
                echo '<value="'.$totalProducto->detalle.'"/>';
                
            }
            else{
                echo "<value=Sin Resultado/>";
            }
            */
           //$model = new Productos; 
            $dataProvider = new ActiveDataProvider([
            'query' => Productos::find(),
        ]);

          
           return $this->renderPartial('listado',['dataProvider'=>$dataProvider]); 
       

    }
    /****************************************************************************************/
    public function actionRta($id)
    {
        $pro = Productos::findOne($id);
        return $this->renderAjax($pro);
    }
    /****************************************************************************************/
    /**
     * Finds the Productos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Productos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Productos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
