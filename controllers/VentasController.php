<?php

namespace app\controllers;

use Yii;
use app\models\Ventas;
use app\models\Detalleventa;
use app\models\Clientes;
use app\models\Vendedores;
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

    /****************************************************************************************
     * Creates a new Ventas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate1()

    {

         $modelCustomer = new Ventas;
        $modelsAddress = [new Detalleventa];
        if ($modelCustomer->load(Yii::$app->request->post())) {
            /*
            echo '<pre>';
            print_r(Yii::$app->request->post());
            echo '</pre>';
            Yii::$app->end();
            */
            $modelsAddress = Model::createMultiple(Detalleventa::classname());
            Model::loadMultiple($modelsAddress, Yii::$app->request->post());

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
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelCustomer->save(false)) {
                        foreach ($modelsAddress as $modelAddress) {
                            $modelAddress->customer_id = $modelCustomer->id;
                            if (! ($flag = $modelAddress->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelCustomer->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('ventadetalles', [
            'modelCustomer' => $modelCustomer,
            'modelsAddress' => (empty($modelsAddress)) ? [new Address] : $modelsAddress
        ]);
    }


    /****************************************************************************************/
    public function actionCreate()
    {
        $model = new Ventas();
        
    if ($model->load(Yii::$app->request->post()))
    {
      
      //uso esta vista para mostrar loss datos recuperadao de la grilla de ventas por detalle
        //luego hay que guardar cada registro en la tabla detalle con los campos correspondietes

        return $this->render('prueba',['model'=>Yii::$app->request->post()]);
       Yii::$app->end();
      
        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idVenta]);
        }
        */
    }
        $modDet = new Detalleventa();
        $modCli = new Clientes();
        $modVendedor = new Vendedores();
        return $this->render('create', [
            'model' => $model,'modDet'=>$modDet,'modCli'=>$modCli, 'modVendedor'=>$modVendedor, 
        ]);
    }
   

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
}
