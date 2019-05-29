<?php


class CreateUserCest
{
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }
    // tests
    public function loginWithCorrectCredentials(ApiTester $I)
    {
      $I->sendPOST("/auth/login", [
        'username'=>'Admin',
        'password'=>'Admin123'
      ]);

      $I->seeResponseCodeIs(200);

      $I->seeResponseContainsJson([
        "status" => 201,
        "access_token" => "xDq1YntmW8DRkJ-nUld7mMpRdjKXuL2P",
        "userData" => [
          "role" => "Tajnik",
          "ID" => 1
        ]
      ]);
    }

  public function loginWithBadCredentials(ApiTester $I)
  {
    $I->sendPOST("/auth/login", [
      'username'=>'Admin',
      'password'=>'Admin1233'
    ]);

    $I->seeResponseCodeIs(200);

    $I->seeResponseContainsJson([
      "status" => 400,
      'errors' => "Unijeli ste krivo korisničko ime ili lozinku"
    ]);
  }
}
