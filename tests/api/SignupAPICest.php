<?php


class SignupAPICest
{
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }

    // tests
    public function SignupCorrectInformation(ApiTester $I)
    {
      $I->amGoingTo("sign up via REST API");
      $I->sendPOST("/auth/signup", [
        'username' => 'TestAPI',
        'password' => 'TestAPI',
        'passwordRepeat' => 'TestAPI',
        'email' => 'mail@veleri.hr',
        'name' => 'tester',
        'surname' => 'tester',
        'phoneNumber' => '1231231'
      ]);

      $I->amGoingTo("see a success signup");

      $I->seeResponseContains("Uspješno ste registrirani");
    }

    public function SignupWithSameEmail(ApiTester $I){
      $I->amGoingTo("sign up via REST API with same E-Mail");
      $I->sendPOST("/auth/signup", [
        'username' => 'TestAPI2',
        'password' => 'TestAPI',
        'passwordRepeat' => 'TestAPI',
        'email' => 'mail@veleri.hr',
        'name' => 'tester',
        'surname' => 'tester',
        'phoneNumber' => '123123121'
      ]);

      $I->amGoingTo("see a message that the E-Mail is already taken");

      $I->seeResponseContains("E-Mail \\\"mail@veleri.hr\\\" has already been taken.");
    }

  public function SignupWithSameUsername(ApiTester $I){
    $I->amGoingTo("sign up via REST API with same username");
    $I->sendPOST("/auth/signup", [
      'username' => 'TestAPI',
      'password' => 'TestAPI',
      'passwordRepeat' => 'TestAPI',
      'email' => 'mail2@veleri.hr',
      'name' => 'tester',
      'surname' => 'tester',
      'phoneNumber' => '123123121'
    ]);

    $I->amGoingTo("see a message that the username is already taken");

    $I->seeResponseContains("Korisnicko ime \\\"TestAPI\\\" has already been taken.");
  }

  public function SignupWithSamePhonenumber(ApiTester $I){
    $I->amGoingTo("sign up via REST API with same phonenumber");
    $I->sendPOST("/auth/signup", [
      'username' => 'TestAPI2',
      'password' => 'TestAPI',
      'passwordRepeat' => 'TestAPI',
      'email' => 'mail2@veleri.hr',
      'name' => 'tester',
      'surname' => 'tester',
      'phoneNumber' => '1231231'
    ]);

    $I->amGoingTo("see a message that the phonenumber is already taken");

    $I->seeResponseContains("Broj mobitela \\\"1231231\\\" has already been taken.");
  }
}
