<?php


class PrijavaAPICest
{
  public function _before(ApiTester $I)
  {
    $I->amBearerAuthenticated("xDq1YntmW8DRkJ-nUld7mMpRdjKXuL2P");
  }

  public function _after(ApiTester $I)
  {
  }

  // tests
  public function tryToCreatePrijava(ApiTester $I)
  {
    $I->amGoingTo("Send a Prijava data via POST Request");
    $I->sendPOST("/prijava",[
      'ID_Korisnik' => 11,
      'Opis' => 'OpisAPI',
      'Long' => 14,
      'Lat' => 43
    ]);
    $I->expect("to see the new data input in JSON format");
    $I->seeResponseIsJson();
    $I->seeResponseContainsJson([
      'ID_Korisnik' => 11,
      'Opis' => 'OpisAPI',
      'Long' => 14,
      'Lat' => 43
    ]);
  }

  public function testOtherHttpMethods(ApiTester $I)
  {
    $I->amGoingTo("Send a post request to \"/prijava\"");
    $I->sendGET("/prijava");
    $I->expect("To see page not found");
    $I->seeResponseContains("Not Found");

    $I->amGoingTo("Send a post request to \"/prijava\"");
    $I->sendDELETE("/prijava");
    $I->expect("To see page not found");
    $I->seeResponseContains("Not Found");

    $I->amGoingTo("Send a post request to \"/prijava\"");
    $I->sendPUT("/prijava");
    $I->expect("To see page not found");
    $I->seeResponseContains("Not Found");
  }
}
