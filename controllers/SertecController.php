<?php

namespace app\controllers;

use Yii;
use app\models\Sertec;
use app\models\Clientes;
use kartik\mpdf\Pdf;
use app\models\Equiposervicios;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SertecController implements the CRUD actions for Sertec model.
 */
class SertecController extends Controller
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
     * Lists all Sertec models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Sertec::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sertec model.
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
     * Creates a new Sertec model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sertec();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idServicio]);
        }
        $modCli= new Clientes();
        $cli  = $modCli->find()->all();
        $modEqui = new Equiposervicios();
        $equi  = $modEqui->find()->all();
        return $this->render('create', [
            'model' => $model,'cli'=>$cli,'equi'=>$equi,
        ]);
    }

    /**
     * Updates an existing Sertec model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idServicio]);
        }
        $modCli= new Clientes();
        $cli  = $modCli->find()->all();
        $modEqui = new Equiposervicios();
        $equi  = $modEqui->find()->all();


        return $this->render('update', [
            'model' => $model,'cli'=>$cli,'equi'=>$equi,
        ]);
    }

    /**
     * Deletes an existing Sertec model.
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
    public function actionFormulario()
    {
        //$model = new clientes();
        $model = $this->findModel(2); //con esto obtengo el servicio tecnico deseado
        $modCli = clientes::findOne($model->idCliente);
        $modEqui = Equiposervicios::findOne($model->idEquipo);

    $content = $this->renderPartial('/sertec/formServicio',['modCli'=>$modCli, 'model'=>$model,'modEqui'=>$modEqui]);
    
    // setup kartik\mpdf\Pdf component
    $pdf = new Pdf([
        // set to use core fonts only
        'mode' => Pdf::MODE_CORE, 
        // A4 paper format
        'format' => Pdf::FORMAT_A4, 
        // portrait orientation
        'orientation' => Pdf::ORIENT_PORTRAIT, 
        // stream to browser inline
        'destination' => Pdf::DEST_BROWSER, 
        // your html content input
        'content' => $content,  
        // format content from your own css file if needed or use the
        // enhanced bootstrap css built by Krajee for mPDF formatting 
        'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.css',
        // any css to be embedded if required
        'cssInline' => '.kv-heading-1{font-size:18px}', 
         // set mPDF properties on the fly
        'options' => ['title' => 'Informe para Ventas Diarias'],
         // call mPDF methods on the fly
        'methods' => [ 
            'SetHeader'=>['Reporte Diario'], 
            'SetFooter'=>['{PAGENO}'],
        ]
    ]);
    
    // return the pdf output as per the destination setting
    //return $pdf->render(); 
           return $this->render('formservicio',['modCli'=>$modCli,'model'=>$model,'modEqui'=>$modEqui]);
    }
    /**
     * Finds the Sertec model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sertec the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sertec::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}


