<?php


class LoginCest
{
  public function _before(AcceptanceTester $I)
  {
    $I->amOnPage("/site/login");
  }

  public function _after(AcceptanceTester $I)
  {

  }

  public function correctLogin(AcceptanceTester $I)
  {
    $I->amGoingTo("input correct data into the login form");
    $I->submitForm("#login-form", [
      'LoginForm[username]' => 'Admin',
      'LoginForm[password]' => 'Admin123'
    ], 'Login');
    $I->expect("I'm going to get redirected to the homepage");
    $I->seeCurrentUrlEquals("/");
  }

  public function falseLogin(AcceptanceTester $I)
  {
    $I->amGoingTo("input false data into the login form");
    $I->submitForm("#login-form", [
      'LoginForm[username]' => [
        'Admin123',
        'WrongUsername',
        'WrongUsername123'
      ],
      'LoginForm[password]' => [
        'Admin1223123',
        'WrongPassword',
        'WrongPassword123'
      ]
    ], 'Login');
    $I->expect("to see a message that entered username or password is wrong");
    $I->see('Incorrect username or password.');
  }

  public function checkEmptyForm(AcceptanceTester $I)
  {
    $I->amGoingTo("leave username field empty");
    $I->submitForm("#login-form", [
      'LoginForm[username]' => '',
      'LoginForm[password]' => 'Admin123'
    ], 'Login');
    $I->expect("to see a message that username field can't be empty");
    $I->see('Username cannot be blank');

    $I->amGoingTo("leave password field empty");
    $I->submitForm("#login-form", [
      'LoginForm[username]' => 'Admin',
      'LoginForm[password]' => ''
    ], 'Login');
    $I->expect("to see a message that password field can't be empty");
    $I->see('Password cannot be blank');


    $I->amGoingTo("leave both fields empty");
    $I->submitForm("#login-form", [
      'LoginForm[username]' => '',
      'LoginForm[password]' => ''
    ], 'Login');
    $I->expect("to see a message that username and password field can't be empty");
    $I->see('Username cannot be blank');
    $I->see('Password cannot be blank');

  }

}
