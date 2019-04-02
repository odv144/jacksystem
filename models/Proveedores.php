<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proveedores".
 *
 * @property int $idProveedor
 * @property string $cuit
 * @property string $razonSocial
 * @property string $tel_fijo
 * @property string $tel_movil
 * @property string $direcion
 * @property string $email
 * @property string $condicionIva
 *
 * @property Pagos[] $pagos
 */
class Proveedores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proveedores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cuit'], 'required'],
            [['cuit'], 'string', 'max' => 13],
            [['razonSocial', 'condicionIva'], 'string', 'max' => 100],
            [['tel_fijo', 'tel_movil'], 'string', 'max' => 15],
            [['direcion', 'email'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idProveedor' => 'Id Proveedor',
            'cuit' => 'Cuit',
            'razonSocial' => 'Razon Social',
            'tel_fijo' => 'Telefono Fijo',
            'tel_movil' => 'Celular',
            'direcion' => 'Direcion',
            'email' => 'Email',
            'condicionIva' => 'Condicion Iva',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pagos::className(), ['idProveedor' => 'idProveedor']);
    }
    public function getProductos()
    {
        return $this->hasMany(Productos::className(),['idProveedor'=>'idProveedor']);
    }
}
