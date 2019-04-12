<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalleventa".
 *
 * @property int $idDetVenta
 * @property int $idProducto
 * @property int $idVenta
 * @property int $cantidad
 * @property double $p_u
 * @property double $iva
 * @property string $nroFactura
 *
 * @property Productos $producto
 * @property Ventas[] $ventas
 */
class Detalleventa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detalleventa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idProducto', 'cantidad', 'idVenta','p_u', 'iva', 'nroFactura'], 'required'],
            [['idProducto', 'cantidad','idVenta'], 'integer'],
            [['p_u', 'iva'], 'number'],
            [['nroFactura'], 'string', 'max' => 11],
            [['idProducto'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::className(), 'targetAttribute' => ['idProducto' => 'idProducto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idDetVenta' => 'Id Det Venta',
            'idProducto' => 'Id Producto',
            'idVenta'=>'Id Venta',
            'cantidad' => 'Cantidad',
            'p_u' => 'P U',
            'iva' => 'Iva',
            'nroFactura' => 'Nro Factura',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Productos::className(), ['idProducto' => 'idProducto']);
    }

    /**
     * @return \yii\db\ActiveQuery
    public function getVentas()
    {
        return $this->hasMany(Ventas::className(), ['idDetVenta' => 'idDetVenta']);
    }
     */
     public function getVenta()
    {
        return $this->hasMany(Ventas::className(), ['idVenta' => 'idVenta']);
    }
}
