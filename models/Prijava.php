<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Prijava".
 *
 * @property int $ID
 * @property string $Opis
 * @property string $Vrijeme_Prijave
 * @property string $Lat
 * @property string $Long
 * @property int $Odobreno
 * @property string $Vrijeme_Odobrenja
 * @property int $ID_Novost
 * @property int $ID_Korisnik
 *
 * @property Korisnik $korisnik
 * @property Novost $novost
 * @property StanjeTerena[] $stanjeTerenas
 */
class Prijava extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'Prijava';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['Vrijeme_Prijave', 'Vrijeme_Odobrenja'], 'safe'],
      [['Lat', 'Long'], 'number'],
      [['Odobreno', 'ID_Novost', 'ID_Korisnik'], 'integer'],
      [['Opis'], 'string', 'max' => 255],
      [['ID_Korisnik'], 'exist', 'skipOnError' => true, 'targetClass' => Korisnik::className(), 'targetAttribute' => ['ID_Korisnik' => 'ID']],
      [['ID_Novost'], 'exist', 'skipOnError' => true, 'targetClass' => Novost::className(), 'targetAttribute' => ['ID_Novost' => 'ID']],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'ID' => 'ID',
      'Opis' => 'Opis',
      'Vrijeme_Prijave' => 'Vrijeme Prijave',
      'Lat' => 'Lat',
      'Long' => 'Long',
      'Odobreno' => 'Odobreno',
      'Vrijeme_Odobrenja' => 'Vrijeme Odobrenja',
      'ID_Novost' => 'Id Novost',
      'ID_Korisnik' => 'Id Korisnik',
    ];
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getKorisnik()
  {
    return $this->hasOne(Korisnik::className(), ['ID' => 'ID_Korisnik']);
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getNovost()
  {
    return $this->hasOne(Novost::className(), ['ID' => 'ID_Novost']);
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getStanjeTerenas()
  {
    return $this->hasMany(StanjeTerena::className(), ['ID_Prijava' => 'ID']);
  }
}
