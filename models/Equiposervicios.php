<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equiposervicios".
 *
 * @property int $idEquipo
 * @property string $marca
 * @property string $modelo
 * @property string $imei
 * @property bool $sim
 * @property bool $bateria
 * @property bool $tarjetaMemoria
 * @property bool $per
 * @property bool $cla
 * @property bool $mov
 *
 * @property Sertec[] $sertecs
 */
class Equiposervicios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equiposervicios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['marca', 'modelo', 'imei'], 'required'],
            [['sim', 'bateria', 'tarjetaMemoria', 'per', 'cla', 'mov'], 'boolean'],
            [['marca', 'modelo', 'imei'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idEquipo' => 'Id Equipo',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'imei' => 'Imei',
            'sim' => 'Sim',
            'bateria' => 'Bateria',
            'tarjetaMemoria' => 'Tarjeta Memoria',
            'per' => 'Per',
            'cla' => 'Cla',
            'mov' => 'Mov',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSertecs()
    {
        return $this->hasMany(Sertec::className(), ['idEquipo' => 'idEquipo']);
    }
}
