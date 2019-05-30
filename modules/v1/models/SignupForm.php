<?php

namespace app\modules\v1\models;

use app\models\Korisnik;
use app\models\Uloga;
use yii\base\Model;


class SignupForm extends Model
{
  public $username;
  public $password;
  public $email;
  public $name;
  public $surname;
  public $phoneNumber;
  public $passwordRepeat;

  public function rules()
  {
    return [
      ['passwordRepeat', 'required'],
      ['passwordRepeat', 'compare', 'compareAttribute' => 'password', 'message'=>"Lozinke moraju biti jednake"]
    ];
  }

  public function signup()
  {
    if($this->validate()){
      $user = new Korisnik();

      $user->Korisnicko_Ime = $this->username;
      $user->Lozinka = $this->password;
      $user->EMail = $this->email;
      $user->Ime = $this->name;
      $user->Prezime = $this->surname;
      $user->Broj_Mobitela = $this->phoneNumber;
      $user->ID_Uloge = Uloga::findOne(['Naziv_Uloge' => 'Civil'])->ID;

      if ($user->validate(['Korisnicko_Ime', 'Lozinka', 'EMail', 'Ime', 'Prezime', 'Broj_Mobitela']) &&
        $user->save(true,
          ['Korisnicko_Ime', 'Lozinka', 'EMail', 'Ime', 'Prezime', 'Broj_Mobitela', 'accessToken', 'ID_Uloge'])) {
        return null;
      } else {
        return $user->getErrors();
      }
    }
    return $this->getErrors();
  }
}