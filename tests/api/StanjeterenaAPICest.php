<?php


class StanjeterenaAPICest
{
  public function _before(ApiTester $I)
  {
    $I->amBearerAuthenticated("xDq1YntmW8DRkJ-nUld7mMpRdjKXuL2P");
  }

  public function _after(ApiTester $I)
  {
  }

  // tests
  public function tryToCreateStanjeTerena(ApiTester $I)
  {
    $I->amGoingTo("Send new StanjeTerena data via POST Request");
    $I->sendPOST("/stanje-terena", [
      'ID_Korisnik' => 11,
      'Trajanje' => '5min',
      'Opis' => 'OpisAPI',
      'Broj_Vatrogasaca' => 14,
      'Broj_Vozila' => 43
    ]);
    $I->expect("to see the new data input in JSON format");
    $I->seeResponseIsJson();
    $I->seeResponseContainsJson([
      'ID_Korisnik' => 11,
      'Trajanje' => '5min',
      'Opis' => 'OpisAPI',
      'Broj_Vatrogasaca' => 14,
      'Broj_Vozila' => 43,
    ]);
  }

  public function testOtherHttpMethods(ApiTester $I)
  {
    $I->amGoingTo("Send a post request to \"/stanje-terena\"");
    $I->sendGET("/stanje-terena");
    $I->expect("To see page not found");
    $I->seeResponseContains("Not Found");

    $I->amGoingTo("Send a post request to \"/stanje-terena\"");
    $I->sendDELETE("/stanje-terena");
    $I->expect("To see page not found");
    $I->seeResponseContains("Not Found");

    $I->amGoingTo("Send a post request to \"/stanje-terena\"");
    $I->sendPUT("/stanje-terena");
    $I->expect("To see page not found");
    $I->seeResponseContains("Not Found");
  }
}
