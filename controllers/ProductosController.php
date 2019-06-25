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
    public $gloAgre = array();
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
    public function actionCreate($estado=false)
    {
        $model = new Productos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idProducto]);
        }
        $modPro=new Proveedores();
        $datos  = $modPro->find()->all();
        if ($estado) {

        return $this->render('create', [
            'model' => $model,'datos'=>$datos,
        ]);
        }else
            {
                return $this->renderPartial('create', [
            'model' => $model,'datos'=>$datos,
        ]);
            }
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
           $model = Productos::find()->all(); 

            $dataProvider = new ActiveDataProvider([
            'query' => Productos::find(),
        ]);

          
           return $this->renderPartial('listado',['dataProvider'=>$dataProvider,'model'=>$model]); 
            
       

    }
    /****************************************************************************************/
    public function actionPrueba()
    {
        $model = new Productos;
        
         if ($model->load(Yii::$app->request->post()) ) {
          
            $algo = Yii::$app->request->post();
            //echo 'ESte es prosele'.$algo['proSelec'][0];
           foreach ($algo['proSelec'] as $key => $value) {
               $pro = Productos::findOne($value);
                array_push($this->gloAgre,$pro);
           }
           print_r($this->gloAgre);
            //return $this->redirect(['view', 'id' => $model->idProducto]);
        }
         $dataProvider = new ActiveDataProvider([
            'query' => Productos::find(),
        ]);

       return $this->renderPartial('prueba',['model'=>$model, 'dataProvider'=>$dataProvider]);
    }

     /****************************************************************************************/
    
    public function actionRta($keys)
    {
        
        print_r($keys);
        var_dump($keys);
       // print_r(Yii::$app()->request->post());
       //$agregados.= json::encode($pro);
        //array_push($agregados,$pro);
       //$agregados[$id]=$pro;
        //return ($this->renderPartial('prueba'));
      
    }
     /****************************************************************************************/
     public function actionRta2($id,$mio='{"id":30}')
     {
        
        $pro = Productos::findOne($id);
        //echo 'id recibido'.$id.'<br>';
        $jmio = json_decode($mio); //decodifica la variable $mio de tipo json al array
        //$usoArray=[["id"=>30],["id"=>33],["id"=>30]];
        $agregados=array();
        
        //array_push($agregados,$jmio); //agrego a un array uno nuevo para guardar el registro de productos agregados
        array_push($this->gloAgre, $jmio);
        array_push($this->gloAgre, $jmio);
        array_push($this->gloAgre, $jmio);
        array_push($this->gloAgre, $jmio);
        
      
        echo 'valor json '.$jmio->id.'<br>';
        //print_r($jmio);
        foreach ($this->gloAgre as $key => $value) {
              echo 'valor json compuesto es '.$value->id.'<br>';
        }
        /*
        foreach ($agregados as $key => $value) {
              echo 'valor json compuesto es '.$value->id.'<br>';
        }
       */
        //var_dump($this->gloAgre);

       $jagre = json_encode($this->gloAgre);
       // $jagre = json_encode($agregados);
       // $jagre = json_decode($jagre);
       // print_r($jagre);
        
        $pro = $this->gloAgre;
       //$agregados.= json::encode($pro);
        //array_push($agregados,$pro);
       //$agregados[$id]=$pro;
       
       //return json::encode($pro);
        return $this->renderPartial('prueba',['pro'=>$pro,'agrega'=>$jagre,]);
     }
      /********************************
     
     public function actionRta2($id,$mio='{"id":30}') //backup cuando todavi funcionaba 
     {
        // $pro = Productos::find()->all();
        $pro = Productos::findOne($id);
        echo 'id recibido'.$id.'<br>';
        $jmio = json_decode($mio); //decodifica la variable $mio de tipo json al array
        //$usoArray=[["id"=>30],["id"=>33],["id"=>30]];
        $agregados=array();
        
        array_push($agregados,$jmio); //agrego a un array uno nuevo para guardar el registro de productos agregados
        
       /****
        $jmio =json_decode('{"id":1}');
        array_push($agregados,$jmio);
        permite cargar el vector $agregados con valores simulados del exterioir
        for($i =0;$i<5;$i++)
        {
            $jmio = json_decode('{"id":'.$i.'}');
            array_push($agregados,$jmio);
        }
        ****
       // print_r($agregados);
        echo 'valor json '.$jmio->id.'<br>';
        //print_r($jmio);
        foreach ($agregados as $key => $value) {
              echo 'valor json compuesto es '.$value->id.'<br>';
        }
        //permite devolver el resultado de la busqueda en un dataprovider
        /**
        $pro = new ActiveDataProvider([
           // 'query' => Productos::findBySql("SELECT * FROM `productos` WHERE `idProducto` = ".$id),
             ]);
        **
        $jagre = json_encode($agregados);
       // $jagre = json_decode($jagre);
       // print_r($jagre);
        var_dump($pro);
        $pro = $agregados;
       //$agregados.= json::encode($pro);
        //array_push($agregados,$pro);
       //$agregados[$id]=$pro;
       
       //return json::encode($pro);
        return $this->renderPartial('prueba',['pro'=>$pro,'agrega'=>$jagre,]);
     }
    /****************************************************************************************/
    public function actionCargar($id)
    {
        $pro = Productos::findOne($id);
       //$agregados.= json::encode($pro);
        //array_push($agregados,$pro);
       //$agregados[$id]=$pro;
       
        return json::encode($pro);
       // return json::encode($pro);
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
