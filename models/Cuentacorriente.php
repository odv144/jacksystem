<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cuentacorriente".
 *
 * @property int $idCtaCte
 * @property int $idCliente
 * @property string $nroFactura
 * @property string $fechaMov
 * @property double $entrega
 * @property double $deuda
 * @property double $saldo
 *
 * @property Clientes $cliente
 */
class Cuentacorriente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cuentacorriente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCliente', 'fechaMov'], 'required'],
            [['idCliente'], 'integer'],
            [['fechaMov'], 'safe'],
            [['entrega', 'deuda', 'saldo'], 'number'],
            [['nroFactura'], 'string', 'max' => 11],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['idCliente' => 'idCliente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCtaCte' => 'Id Cta Cte',
            'idCliente' => 'Id Cliente',
            'nroFactura' => 'Nro Factura',
            'fechaMov' => 'Fecha Mov',
            'entrega' => 'Entrega',
            'deuda' => 'Deuda',
            'saldo' => 'Saldo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Clientes::className(), ['idCliente' => 'idCliente']);
    }
}
