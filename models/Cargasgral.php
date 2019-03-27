<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cargasgral".
 *
 * @property int $idCarga
 * @property string $fecha
 * @property string $detalle
 * @property double $totalDiario
 */
class Cargasgral extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargasgral';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha', 'detalle', 'totalDiario'], 'required'],
            [['fecha'], 'safe'],
            [['totalDiario'], 'number'],
            [['detalle'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCarga' => 'Id Carga',
            'fecha' => 'Fecha',
            'detalle' => 'Detalle',
            'totalDiario' => 'Total Diario',
        ];
    }
}
