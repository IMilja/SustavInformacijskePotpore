<?php


class MenuItemAccessCest
{
  public function _before(AcceptanceTester $I)
  {
    $I->amOnPage("/");
  }

  public function _after(AcceptanceTester $I)
  {

  }

  public function denyAccessToCRUDMenus(AcceptanceTester $I)
  {
    $I->amGoingTo("access every CRUD menu");
    $menuItems = $I->grabMultiple(".navbar-right li a", 'href');
    foreach ($menuItems as $menuItem) {
      if ($menuItem !== "/site/index" && $menuItem !== "/") {
        $I->amOnPage($menuItem);
        $I->expect("to see a login form");
        $I->seeElement("#login-form");
        $I->expect("To return to the home page");
        $I->amOnPage("/");
      }
    }
  }

  public function allowAccessToCRUDMenus(AcceptanceTester $I)
  {
    $this->loginFunction($I);
    $I->amGoingTo("access every menu item");
    $menuItems = $I->grabMultiple(".navbar-right li a", 'href');
    foreach ($menuItems as $menuItem) {
      if ($menuItem !== "/site/index" && $menuItem !== "/") {
        $I->amOnPage($menuItem);
        $I->expect("to see a grid view of all items");
        $I->seeElement('a', [
          'href' => $menuItem . "/create"
        ]);
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
