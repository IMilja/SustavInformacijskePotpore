<?php


class KorisnikAPICest
{
  public function _before(ApiTester $I)
  {
    $I->amBearerAuthenticated("xDq1YntmW8DRkJ-nUld7mMpRdjKXuL2P");
  }

  public function _after(ApiTester $I)
  {
  }

  // tests
  public function getCorrectData(ApiTester $I)
  {
    $I->amGoingTo("Retrive data from /korisnik");
    $I->sendGET("/korisnik");
    $I->expect("to get a response in JSON format");
    $I->seeResponseIsJson();
    $I->expect("to see valid data in a JSON response");
    $I->seeResponseContainsJson([
      'ID_Prijave' => 3,
      'Opis_Prijave' => "Test",
      'Ime' => "Pero",
      'Prezime' => "Peric"
    ]);
  }

  public function testOtherHttpMethods(ApiTester $I)
  {
    $I->amGoingTo("Send a post request to \"/korisnik\"");
    $I->sendPOST("/korisnik");
    $I->expect("To see page not found");
    $I->seeResponseContains("Not Found");

    $I->amGoingTo("Send a post request to \"/korisnik\"");
    $I->sendDELETE("/korisnik");
    $I->expect("To see page not found");
    $I->seeResponseContains("Not Found");

    $I->amGoingTo("Send a post request to \"/korisnik\"");
    $I->sendPUT("/korisnik");
    $I->expect("To see page not found");
    $I->seeResponseContains("Not Found");
  }
}
