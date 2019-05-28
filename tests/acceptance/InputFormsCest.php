<?php


class InputFormsCest
{
  public function _before(AcceptanceTester $I)
  {
    $this->loginFunction($I);
  }

  public function _after(AcceptanceTester $I)
  {

  }

  public function checkIfForms(AcceptanceTester $I)
  {
    $menuItems = $I->grabMultiple(".navbar-right li a", "href");
    foreach ($menuItems as $menuItem) {
      if ($menuItem !== "/site/index" && $menuItem !== "/") {
        $I->amOnPage($menuItem . "/create");
        $I->expect("to see a input form");
        $I->seeElement("form");
      }
    }
  }

  private function loginFunction(AcceptanceTester $I)
  {
    $I->amOnPage("/");
    $I->amOnPage("/site/login");
    $I->expect("a login form");
    $I->seeElement("#login-form");
    $I->expect("to see login fields");
    $I->seeElement("#loginform-username");
    $I->seeElement("#loginform-password");
    $I->submitForm("#login-form", [
      'LoginForm[username]' => 'Admin',
      'LoginForm[password]' => 'Admin123'
    ], 'login-button');
    $I->expect("i don't see wrong login or password warning");
    $I->dontSee("Incorrect username or password.");
    $I->see("Sustav informacijske potpore");
  }
}
