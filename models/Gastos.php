<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gastos".
 *
 * @property int $idGasto
 * @property string $fecha
 * @property string $detalle
 * @property double $monto
 */
class Gastos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gastos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha', 'detalle', 'monto'], 'required'],
            [['fecha'], 'safe'],
            [['monto'], 'number'],
            [['detalle'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idGasto' => 'Id Gasto',
            'fecha' => 'Fecha',
            'detalle' => 'Detalle',
            'monto' => 'Monto',
        ];
    }
}
