<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vendedores".
 *
 * @property int $idVendedor
 * @property string $apellido
 * @property string $nombre
 * @property string $telefono
 * @property string $categoria
 *
 * @property Ventas[] $ventas
 */
class Vendedores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vendedores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['apellido', 'nombre'], 'required'],
            [['apellido', 'nombre', 'categoria'], 'string', 'max' => 100],
            [['telefono'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idVendedor' => 'Id Vendedor',
            'apellido' => 'Apellido',
            'nombre' => 'Nombre',
            'telefono' => 'Telefono',
            'categoria' => 'Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Ventas::className(), ['idVendedor' => 'idVendedor']);
    }
}
