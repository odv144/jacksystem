<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cierre".
 *
 * @property int $idFecha
 * @property string $tiempoCierre
 * @property double $montoFinal
 * @property string $obs
 */
class Cierre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cierre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tiempoCierre', 'montoFinal'], 'required'],
            [['tiempoCierre'], 'safe'],
            [['montoFinal'], 'number'],
            [['obs'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idFecha' => 'Id Fecha',
            'tiempoCierre' => 'Tiempo Cierre',
            'montoFinal' => 'Monto Final',
            'obs' => 'Obs',
        ];
    }
}
