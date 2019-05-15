<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

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
class Korisnik extends \yii\db\ActiveRecord implements IdentityInterface
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
      [['ID_Uloge'], 'exist', 'skipOnError' => true,
        'targetClass' => Uloga::className(),
        'targetAttribute' => ['ID_Uloge' => 'ID']
      ],
      [['Korisnicko_Ime', 'Lozinka', 'EMail', 'Ime', 'Prezime', 'Broj_Mobitela', 'OIB'],
        'required', 'message' => '{attribute} ne smije biti prazno polje'],
      [['Lozinka'], 'string', 'min' => 6,
        'tooShort' => 'Lozinka ne može biti kraća od 6 znakova'
      ],
      ['EMail', 'email', 'message' => 'Niste unijeli pravilnu E-Mail adresu']
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'ID' => 'ID',
      'Korisnicko_Ime' => 'Korisnicko ime',
      'Lozinka' => 'Lozinka',
      'EMail' => 'E-Mail',
      'Ime' => 'Ime',
      'Prezime' => 'Prezime',
      'Broj_Mobitela' => 'Broj mobitela',
      'OIB' => 'OIB',
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

  /**
   * Finds an identity by the given ID.
   * @param string|int $id the ID to be looked for
   * @return IdentityInterface the identity object that matches the given ID.
   * Null should be returned if such an identity cannot be found
   * or the identity is not in an active state (disabled, deleted, etc.)
   */
  public static function findIdentity($id)
  {
    return static::findOne($id);
  }

  /**
   * Finds an identity by the given token.
   * @param mixed $token the token to be looked for
   * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
   * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
   * @return IdentityInterface the identity object that matches the given token.
   * Null should be returned if such an identity cannot be found
   * or the identity is not in an active state (disabled, deleted, etc.)
   */
  public static function findIdentityByAccessToken($token, $type = null)
  {
    return static::findOne(['accessToken' => $token]);
  }

  /**
   * Returns an ID that can uniquely identify a user identity.
   * @return string|int an ID that uniquely identifies a user identity.
   */
  public function getId()
  {
    return $this->ID;
  }

  /**
   * Returns a key that can be used to check the validity of a given identity ID.
   *
   * The key should be unique for each individual user, and should be persistent
   * so that it can be used to check the validity of the user identity.
   *
   * The space of such keys should be big enough to defeat potential identity attacks.
   *
   * This is required if [[User::enableAutoLogin]] is enabled. The returned key will be stored on the
   * client side as a cookie and will be used to authenticate user even if PHP session has been expired.
   *
   * Make sure to invalidate earlier issued authKeys when you implement force user logout, password change and
   * other scenarios, that require forceful access revocation for old sessions.
   *
   * @return string a key that is used to check the validity of a given identity ID.
   * @see validateAuthKey()
   */
  public function getAuthKey()
  {
    return $this->authKey;
  }

  /**
   * Validates the given auth key.
   *
   * This is required if [[User::enableAutoLogin]] is enabled.
   * @param string $authKey the given auth key
   * @return bool whether the given auth key is valid.
   * @see getAuthKey()
   */
  public function validateAuthKey($authKey)
  {
    return $this->getAuthKey() === $authKey;
  }

  /**
   * @param bool $insert
   * @return bool
   * @throws \yii\base\Exception
   */

  public function beforeSave($insert)
  {
    if (parent::beforeSave($insert)) {
      if ($this->isNewRecord) {
        $this->authKey = \Yii::$app->security->generateRandomString();
        $this->accessToken = \Yii::$app->security->generateRandomString();
        $this->Lozinka = \Yii::$app->security->generatePasswordHash($this->Lozinka);
      }
      return true;
    }
    return false;
  }


  /**
   * Finds user by username
   *
   * @param string $username
   * @return static|null
   */
  public static function findByUsername($username)
  {
    $users = Korisnik::find()->all();
    foreach ($users as $user) {
      if (strcasecmp($user['Korisnicko_Ime'], $username) === 0) {
        return new static($user);
      }
    }

    return null;
  }

  /**
   * Validates password
   *
   * @param string $password password to validate
   * @return bool if password provided is valid for current user
   */
  public function validatePassword($password)
  {
    return \Yii::$app->security->validatePassword($password, $this->Lozinka);
  }

  /**
   * Check if OIB is valid
   * @param $attribute
   * @return bool if OIB providen is valid
   */
  // ToDo: Created and finish OIB validator
  private function CheckOIB($attribute)
  {
    if (strlen($attribute) == 11) {
      $attribute = intval($attribute);
      if (is_numeric($attribute)) {

        $a = 10;

        for ($i = 0; $i < 10; $i++) {

          $a = $a + intval(substr($attribute, $i, 1), 10);
          $a = $a % 10;

          if ($a == 0) {
            $a = 10;
          }

          $a *= 2;
          $a = $a % 11;

        }

        $kontrolni = 11 - $a;

        if ($kontrolni == 10) {
          $kontrolni = 0;
        }

        return $kontrolni === intval(substr($attribute, 10, 1), 10);

      } else {
        $this->addError($attribute, 'Unijeli ste netočni OIB');
        return false;
      }

    } else {
      $this->addError($attribute, 'OIB kojeg ste unijeli je prekratak');
      return false;
    }
  }
}
