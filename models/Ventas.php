<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ventas".
 *
 * @property int $idVenta
 * @property int $idCliente
 * @property int $idVendedor
 * @property int $idDetVenta
 * @property string $nroFactura
 * @property double $totalVenta
 * @property double $descuesto
 * @property string $FormaPago
 *
 * @property Clientes $cliente
 * @property Detalleventa $detVenta
 * @property Vendedores $vendedor
 */
class Ventas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ventas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCliente', 'idVendedor', 'idDetVenta', 'nroFactura', 'totalVenta', 'FormaPago'], 'required'],
            [['idCliente', 'idVendedor', 'idDetVenta'], 'integer'],
            [['totalVenta', 'descuesto'], 'number'],
            [['nroFactura'], 'string', 'max' => 11],
            [['FormaPago'], 'string', 'max' => 100],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['idCliente' => 'idCliente']],
            [['idDetVenta'], 'exist', 'skipOnError' => true, 'targetClass' => Detalleventa::className(), 'targetAttribute' => ['idDetVenta' => 'idDetVenta']],
            [['idVendedor'], 'exist', 'skipOnError' => true, 'targetClass' => Vendedores::className(), 'targetAttribute' => ['idVendedor' => 'idVendedor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idVenta' => 'Id Venta',
            'idCliente' => 'Id Cliente',
            'idVendedor' => 'Id Vendedor',
            'idDetVenta' => 'Id Det Venta',
            'nroFactura' => 'Nro Factura',
            'totalVenta' => 'Total Venta',
            'descuesto' => 'Descuesto',
            'FormaPago' => 'Forma Pago',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Clientes::className(), ['idCliente' => 'idCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetVenta()
    {
        return $this->hasOne(Detalleventa::className(), ['idDetVenta' => 'idDetVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendedor()
    {
        return $this->hasOne(Vendedores::className(), ['idVendedor' => 'idVendedor']);
    }
}
