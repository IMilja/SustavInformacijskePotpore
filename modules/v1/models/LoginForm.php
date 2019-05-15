<?php

namespace app\modules\v1\models;


use app\models\Korisnik;
use yii\base\Model;

class LoginForm extends Model
{
  public $username;
  public $password;

  public function rules()
  {
    return [
      [['username', 'password'], 'required'],
      [['password'], 'string', 'min' => 6, 'tooShort' => 'Lozinka mora biti duža od 6 znakova'],
    ];
  }

  public function login()
  {
    if ($this->validate()) {
      $user = Korisnik::findByUsername($this->username);
      if (empty($user)) {
        return false;
      }
      return $user->validatePassword($this->password);
    }
    return false;
  }
}