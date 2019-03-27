<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $idCliente
 * @property string $dni
 * @property string $apellido
 * @property string $nombre
 * @property string $domicilio
 * @property string $localidad
 * @property string $telfijo
 * @property string $telmovil
 * @property string $email
 * @property string $cuit
 * @property string $condicionIva
 *
 * @property Cuentacorriente[] $cuentacorrientes
 * @property Sertec[] $sertecs
 * @property Ventas[] $ventas
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dni'], 'string', 'max' => 8],
            [['apellido', 'nombre', 'email', 'condicionIva'], 'string', 'max' => 100],
            [['domicilio', 'localidad'], 'string', 'max' => 150],
            [['telfijo'], 'string', 'max' => 30],
            [['telmovil'], 'string', 'max' => 15],
            [['cuit'], 'string', 'max' => 13],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCliente' => 'Id Cliente',
            'dni' => 'Dni',
            'apellido' => 'Apellido',
            'nombre' => 'Nombre',
            'domicilio' => 'Domicilio',
            'localidad' => 'Localidad',
            'telfijo' => 'Telfijo',
            'telmovil' => 'Telmovil',
            'email' => 'Email',
            'cuit' => 'Cuit',
            'condicionIva' => 'Condicion Iva',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuentacorrientes()
    {
        return $this->hasMany(Cuentacorriente::className(), ['idCliente' => 'idCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSertecs()
    {
        return $this->hasMany(Sertec::className(), ['idCliente' => 'idCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Ventas::className(), ['idCliente' => 'idCliente']);
    }
}
