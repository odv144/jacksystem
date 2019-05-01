<?php

namespace app\controllers;

use Yii;
use app\models\Ventas;
use app\models\Detalleventa;
use app\models\Clientes;
use app\models\Vendedores;
use app\models\Productos;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use app\web\Response;
use app\models\Model;
use app\ActiveForm;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * VentasController implements the CRUD actions for Ventas model.
 */
class VentasController extends Controller
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
     * Lists all Ventas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Ventas::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ventas model.
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
    /****************************************************************************************/
     public function actionPrueba1()
    {
      
        $dataProvider = new ActiveDataProvider([
            'query' => Ventas::find(),
        ]);
        $model = new Clientes();
        return $this->render('prueba', [
            'model' => $model,
        ]);
    }
    /****************************************************************************************/
    public function actionLlamda()
    {
        if (\Yii::$app->request->isAjax) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            // get data
            $data = \Yii::$app->request->post();  
            $model = Productos::find()->where(['id'=>$data['id']])->one();
            return [
                'data'=> [
                    'success' => true,
                    'model' => $model
                    
                ],
            ];
        }
    }
    
     /****************************************************************************************/
        public function actionRespuesta($id)
        {
           /*
            $totalProducto = Productos::find()
                    ->where(['idProducto' => $id])
                    ->orderBy('idProducto DESC')
                    ->one();
            */
              $modelCustomer = new Ventas;
            // $modCli  = new Clientes();
             $modelsAddress = [new Detalleventa];
                  
            $model = new Productos; 
            $dataProvider = new ActiveDataProvider([
            'query' => Productos::find()->where(['idProducto'=>$id]),
                ]);
                    
            $canPro =  Productos::find()
                    ->where(['idProducto' => $id])
                    ->count();

            if($canPro>0){

                     $modCli = $this->cargaBox(new Clientes,'idCliente',['apellido','nombre']);
                    $modVen = $this->cargaBox(new Vendedores,'idVendedor',['apellido','nombre']);
                    $modPro = $this->cargaBox(new Productos,'idProducto',['detalle']);
                    return $this->renderAjax('ventadetalles', [
            'modelCustomer' => $modelCustomer,'modCli'=>$modCli, 'modVen'=>$modVen, 'modPro'=>$modPro, '$dataProvider'=>$dataProvider,
            'modelsAddress' => (empty($modelsAddress)) ? [new Address] : $modelsAddress
        ]);


                
            }
            else{
                echo 'no encontro nada';
            }
            /*

          
           return $this->renderPartial('listado',['dataProvider'=>$dataProvider]); 
       */

    }
    /****************************************************************************************/

    /****************************************************************************************
     * Creates a new Ventas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()

    {

         $modelCustomer = new Ventas;
        // $modCli  = new Clientes();

          $modelsAddress = [new Detalleventa];
        if ($modelCustomer->load(Yii::$app->request->post())) {
            /*
            $cambio= Yii::$app->request->post();
            $cambio['Detalleventa']['nroFactura']=$cambio['Ventas']['nroFactura'];
            print_r($cambio);
            echo '<pre>';
            print_r(Yii::$app->request->post());
            echo'</pre>';
            Yii::$app->end();
            
            */

            $modelsAddress = Model::createMultiple(Detalleventa::classname());
            Model::loadMultiple($modelsAddress, Yii::$app->request->post());
            //Model::loadMultiple($modelsAddress, $cambio);
            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsAddress)
                   // ActiveForm::validate($modelCustomer)
                );
            }

            // validate all models
            $valid = $modelCustomer->validate();
            $valid = Model::validateMultiple($modelsAddress) && $valid;
            if (true) {
           // echo 'sillega hasta aca';
             //           yii::$app->end();
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelCustomer->save(false)) {
                        
                        foreach ($modelsAddress as $modelAddress) {
                            $modelAddress->idVenta = $modelCustomer->idVenta;
                            if (! ($flag = $modelAddress->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelCustomer->idVenta]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
       
        $modCli = $this->cargaBox(new Clientes,'idCliente',['apellido','nombre']);
        $modVen = $this->cargaBox(new Vendedores,'idVendedor',['apellido','nombre']);
        $modPro = $this->cargaBox(new Productos,'idProducto',['detalle']);
        return $this->render('ventadetalles', [
            'modelCustomer' => $modelCustomer,'modCli'=>$modCli, 'modVen'=>$modVen, 'modPro'=>$modPro,
            'modelsAddress' => (empty($modelsAddress)) ? [new Address] : $modelsAddress
        ]);
    }


    /**************************************************************************************/
    /*
    *Esta es la funcion original

    public function actionCreate()
    {
        $model = new Ventas();
        
        if ($model->load(Yii::$app->request->post()))
        {
          
          //uso esta vista para mostrar loss datos recuperadao de la grilla de ventas por detalle
            //luego hay que guardar cada registro en la tabla detalle con los campos correspondietes

            return $this->render('prueba',['model'=>Yii::$app->request->post()]);
           Yii::$app->end();
          
           
        }
        
            $modCli = $this->cargaBox(new Clientes,'idCliente',['apellido','nombre']);
            $modVendedor=$this->cargaBox(new Vendedores,'idVendedor',['apellido','nombre']);
            
            return $this->render('create', [
                'model' => $model,'modCli'=>$modCli, 'modVendedor'=>$modVendedor, 
            ]);
        }
   
    */
    /******************************************************************************************/
    /**
     * Updates an existing Ventas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idVenta]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Ventas model.
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

    /**
     * Finds the Ventas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ventas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ventas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionPrueba()
    {
         {
        if (\Yii::$app->request->isAjax) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            // get data
            $data = \Yii::$app->request->post();  
            $model = model::find()->where(['id'=>$data['id']])->one();
            return [
                'data'=> [
                    'success' => true,
                    'model' => $model
                    
                ],
            ];
        }
    }
    }
    /********************************************************************/
    //funcion que permite armar un array con datos de un cammpo de la tabla 
    public function cargaBox($modelo,$id,$campos) //campo puede terne 1 o 2 campos en forma de vector asociativo
    {
        $modGral  = $modelo->find()->all();
        foreach ($campos as $value) 
        {
                $ambos[] =ArrayHelper::map($modGral,$id,$value);
        }

        if(count($campos)>1)//comprueba si hay mas de 1 campo y hay que unirlos en uno solo 
        {

           $ambos =   $this->unirCampos($ambos[0],$ambos[1]);
           
        }else
            {
                //como hay un solo campo los convierte todo a mayuscula
                foreach ($ambos[0] as $value) {
                    $lista[]=strtoupper($value);
                }
                $ambos = $lista;
            
            }

        return $ambos;
    }
    /********************************************************************/
    public function unirCampos($lista1,$lista2)
    {
        $ambos[0]='Elija Una Opcion';
            foreach ($lista1 as $key => $value) 
            {
                $agregado = strtoupper($value.' '.$lista2[$key]);
                array_push($ambos,$agregado);
                
            }
        return $ambos;
    }
    /********************************************************************/


}
