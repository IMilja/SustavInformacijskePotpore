<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Uloga".
 *
 * @property int $ID
 * @property string $Naziv_Uloge
 *
 * @property Korisnik[] $korisniks
 */
class Uloga extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'Uloga';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['Naziv_Uloge'], 'string', 'max' => 24],
      [['Naziv_Uloge'], 'unique'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'ID' => 'ID',
      'Naziv_Uloge' => 'Naziv Uloge',
    ];
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getKorisniks()
  {
    return $this->hasMany(Korisnik::className(), ['ID_Uloge' => 'ID']);
  }
}
