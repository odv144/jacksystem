<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sertec".
 *
 * @property int $idServicio
 * @property int $idCliente
 * @property int $idEquipo
 * @property string $detalle
 * @property string $estado
 * @property string $usoRepuesto
 * @property double $monto
 *
 * @property Clientes $cliente
 * @property Equipservicios $equipo
 */
class Sertec extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sertec';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCliente', 'idEquipo', 'monto'], 'required'],
            [['idCliente', 'idEquipo'], 'integer'],
            [['monto'], 'number'],
            [['detalle'], 'string', 'max' => 150],
            [['estado'], 'string', 'max' => 100],
            [['usoRepuesto'], 'string', 'max' => 255],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['idCliente' => 'idCliente']],
            [['idEquipo'], 'exist', 'skipOnError' => true, 'targetClass' => Equiposervicios::className(), 'targetAttribute' => ['idEquipo' => 'idEquipo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idServicio' => 'Id Servicio',
            'idCliente' => 'Id Cliente',
            'idEquipo' => 'Id Equipo',
            'detalle' => 'Detalle',
            'estado' => 'Estado',
            'usoRepuesto' => 'Uso Repuesto',
            'monto' => 'Monto',
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
    public function getEquipo()
    {
        return $this->hasOne(Equiposervicios::className(), ['idEquipo' => 'idEquipo']);
    }
}
