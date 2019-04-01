<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pagos".
 *
 * @property int $idPago
 * @property string $fecha
 * @property int $idProveedor
 * @property double $entrega
 * @property double $deuda
 * @property double $saldo
 * @property string $formaPago
 * @property string $nroFacCompra
 *
 * @property Proveedores $proveedor
 */
class Pagos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pagos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha', 'idProveedor', 'entrega', 'deuda',  'formaPago', 'nroFacCompra'], 'required'],
            [['fecha','saldo'], 'safe'],
            [['idProveedor'], 'integer'],
            [['entrega', 'deuda', 'saldo'], 'number'],
            [['formaPago'], 'string', 'max' => 100],
            [['nroFacCompra'], 'string', 'max' => 11],
            [['idProveedor'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedores::className(), 'targetAttribute' => ['idProveedor' => 'idProveedor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPago' => 'Id Pago',
            'fecha' => 'Fecha',
            'idProveedor' => 'Id Proveedor',
            'entrega' => 'Entrega',
            'deuda' => 'Deuda',
            'saldo' => 'Saldo',
            'formaPago' => 'Forma Pago',
            'nroFacCompra' => 'Nro Fac Compra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProveedor()
    {
        return $this->hasOne(Proveedores::className(), ['idProveedor' => 'idProveedor']);
    }
}
