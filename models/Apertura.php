<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "apertura".
 *
 * @property int $idFecha
 * @property string $tiempoApertura
 * @property double $montoInicial
 * @property string $obs
 */
class Apertura extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apertura';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['montoInicial'], 'required'],
            [['tiempoApertura'], 'safe'],
            [['montoInicial'], 'number'],
            [['obs'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idFecha' => 'id Fecha',
            'tiempoApertura' => 'Fecha y Hora de Apertura de Caja',
            'montoInicial' => 'Monto Inicial',
            'obs' => 'Obs',
        ];
    }
}
