<?php


class LoginFuncCest
{
  public function _before(FunctionalTester $I)
  {
    $I->amOnRoute("site/login");
  }

  public function openLoginPage(FunctionalTester $I)
  {
    $I->see("Login", "h1");
  }

  // tests
  public function loginWithCorrectCredentials(FunctionalTester $I)
  {
    $I->expect("to see a login form");
    $I->seeElement("form#login-form");

    $I->submitForm("#login-form", [
      'LoginForm[username]' => 'Admin',
      'LoginForm[password]' => 'Admin123'
    ]);

    $I->see("Logout (Admin)");
    $I->dontSeeElement("form#login-form");
  }

  public function loginWithBadCredentials(FunctionalTester $I)
  {
    $I->expect("to see a login form");
    $I->seeElement("form#login-form");

    $I->submitForm("#login-form", [
      'LoginForm[username]' => 'wrong',
      'LoginForm[password]' => 'Wrong123'
    ]);

    $I->expect("to see the login form");
    $I->seeElement("form#login-form");
  }

  public function loginWithNoCredentials(FunctionalTester $I)
  {
    $I->expect("to see a login form");
    $I->seeElement("form");

    $I->submitForm("#login-form", [
      'LoginForm[username]' => 'Admin',
      'LoginForm[password]' => ''
    ]);

    $I->expect("to see password field is blank message");
    $I->see("Password cannot be blank");

    $I->submitForm("#login-form", [
      'LoginForm[username]' => '',
      'LoginForm[password]' => 'Admin123'
    ]);

    $I->expect("to see username field is blank message");
    $I->see("Username cannot be blank");

    $I->submitForm("#login-form", [
      'LoginForm[username]' => '',
      'LoginForm[password]' => ''
    ]);

    $I->expect("to see username and password field is blank message");
    $I->see("Username cannot be blank");
    $I->see("Password cannot be blank");
  }
}
