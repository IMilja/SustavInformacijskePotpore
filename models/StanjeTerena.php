<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "StanjeTerena".
 *
 * @property int $ID
 * @property string $Opis
 * @property string $Trajanje
 * @property int $Broj_Vatrogasaca
 * @property int $Broj_Vozila
 * @property int $ID_Korisnik
 * @property int $ID_Prijava
 *
 * @property Prijava $prijava
 * @property Korisnik $korisnik
 */
class StanjeTerena extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'StanjeTerena';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['Broj_Vatrogasaca', 'Broj_Vozila', 'ID_Korisnik', 'ID_Prijava'], 'integer'],
      [['Opis'], 'string', 'max' => 255],
      [['Trajanje'], 'string', 'max' => 24],
      [['ID_Prijava'], 'exist', 'skipOnError' => true, 'targetClass' => Prijava::className(), 'targetAttribute' => ['ID_Prijava' => 'ID']],
      [['ID_Korisnik'], 'exist', 'skipOnError' => true, 'targetClass' => Korisnik::className(), 'targetAttribute' => ['ID_Korisnik' => 'ID']],
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
      'Trajanje' => 'Trajanje',
      'Broj_Vatrogasaca' => 'Broj Vatrogasaca',
      'Broj_Vozila' => 'Broj Vozila',
      'ID_Korisnik' => 'Id Korisnik',
      'ID_Prijava' => 'Id Prijava',
    ];
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getPrijava()
  {
    return $this->hasOne(Prijava::className(), ['ID' => 'ID_Prijava']);
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getKorisnik()
  {
    return $this->hasOne(Korisnik::className(), ['ID' => 'ID_Korisnik']);
  }
}
