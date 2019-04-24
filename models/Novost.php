<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Novost".
 *
 * @property int $ID
 * @property string $Opis
 * @property string $Vrijeme_Objave
 * @property int $ID_Korisnik
 *
 * @property Korisnik $korisnik
 * @property Prijava[] $prijavas
 */
class Novost extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'Novost';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['Vrijeme_Objave'], 'safe'],
      [['ID_Korisnik'], 'integer'],
      [['Opis'], 'string', 'max' => 255],
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
      'Vrijeme_Objave' => 'Vrijeme Objave',
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
  public function getPrijavas()
  {
    return $this->hasMany(Prijava::className(), ['ID_Novost' => 'ID']);
  }
}
