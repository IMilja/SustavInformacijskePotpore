<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Korisnik".
 *
 * @property int $ID
 * @property string $Korisnicko_Ime
 * @property string $Lozinka
 * @property string $EMail
 * @property string $Ime
 * @property string $Prezime
 * @property string $Broj_Mobitela
 * @property string $OIB
 * @property string $authKey
 * @property string $accessToken
 * @property int $ID_Uloge
 *
 * @property Uloga $uloge
 * @property Novost[] $novosts
 * @property Prijava[] $prijavas
 * @property StanjeTerena[] $stanjeTerenas
 */
class Korisnik extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'Korisnik';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['ID_Uloge'], 'integer'],
      [['Korisnicko_Ime', 'Lozinka', 'EMail', 'authKey', 'accessToken'], 'string', 'max' => 255],
      [['Ime', 'Prezime'], 'string', 'max' => 128],
      [['Broj_Mobitela', 'OIB'], 'string', 'max' => 24],
      [['Korisnicko_Ime'], 'unique'],
      [['EMail'], 'unique'],
      [['OIB'], 'unique'],
      [['Broj_Mobitela'], 'unique'],
      [['ID_Uloge'], 'exist', 'skipOnError' => true, 'targetClass' => Uloga::className(), 'targetAttribute' => ['ID_Uloge' => 'ID']],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'ID' => 'ID',
      'Korisnicko_Ime' => 'Korisnicko Ime',
      'Lozinka' => 'Lozinka',
      'EMail' => 'E Mail',
      'Ime' => 'Ime',
      'Prezime' => 'Prezime',
      'Broj_Mobitela' => 'Broj Mobitela',
      'OIB' => 'Oib',
      'authKey' => 'Auth Key',
      'accessToken' => 'Access Token',
      'ID_Uloge' => 'Id Uloge',
    ];
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getUloge()
  {
    return $this->hasOne(Uloga::className(), ['ID' => 'ID_Uloge']);
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getNovosts()
  {
    return $this->hasMany(Novost::className(), ['ID_Korisnik' => 'ID']);
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getPrijavas()
  {
    return $this->hasMany(Prijava::className(), ['ID_Korisnik' => 'ID']);
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getStanjeTerenas()
  {
    return $this->hasMany(StanjeTerena::className(), ['ID_Korisnik' => 'ID']);
  }
}
