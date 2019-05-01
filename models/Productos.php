<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property int $idProducto
 * @property int $idProveedor
 * @property string $detalle
 * @property double $p_u
 * @property double $iva
 * @property int $stock
 * @property string $marca
 * @property string $modelo
 * @property string $nroSerie
 *
 * @property Detalleventa[] $detalleventas
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idProveedor', 'detalle', 'p_u', 'iva', 'stock'], 'required'],
            [['idProveedor', 'stock'], 'integer'],
            [['p_u', 'iva'], 'number'],
            [['detalle'], 'string', 'max' => 150],
            [['marca', 'modelo', 'nroSerie'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idProducto' => 'Id Producto',
            'idProveedor' => 'Id Proveedor',
            'detalle' => 'Detalle Producto',
            'p_u' => 'Precio Unitario',
            'iva' => 'Iva',
            'stock' => 'Stock',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'nroSerie' => 'Numero Serie',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleventas()
    {
        return $this->hasMany(Detalleventa::className(), ['idProducto' => 'idProducto']);
    }
     public function getProveedor()
    {
        return $this->hasOne(Proveedores::className(), ['idProveedor' => 'idProveedor']);
    }
}
