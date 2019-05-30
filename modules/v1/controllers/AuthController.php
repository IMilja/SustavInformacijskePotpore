<?php


namespace app\modules\v1\controllers;


use app\models\Korisnik;
use app\models\Uloga;
use app\modules\v1\models\LoginForm;
use app\modules\v1\models\SignupForm;
use Yii;
use yii\filters\VerbFilter;
use yii\rest\Controller;

class AuthController extends Controller
{
  public function behaviors()
  {
    return [
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'signup' => ['POST'],
          'login' => ['POST'],
        ],
      ],
    ];
  }

  public function actionSignup()
  {
    $parms = Yii::$app->request->post();

    $model = new SignupForm();

    $model->username = $parms['username'];
    $model->password = $parms['password'];
    $model->name = $parms['name'];
    $model->surname = $parms['surname'];
    $model->email = $parms['email'];
    $model->phoneNumber = $parms['phoneNumber'];
    $model->passwordRepeat = $parms['passwordRepeat'];

    $response['errors'] = $model->signup();

    if (empty($response['errors'])) {
      $response['status'] = '201';
      $response['message'] = 'Uspješno ste registrirani';
    } else {
      $response['status'] = '400';
    }
    return $response;

  }

  public function actionLogin()
  {
    $parms = Yii::$app->request->post();

    $model = new LoginForm();

    $model->username = $parms['username'];
    $model->password = $parms['password'];

    if ($model->login()) {
      $response['status'] = '201';
      $response['access_token'] = Korisnik::findByUsername($model->username)->accessToken;
      $response['userData']['role'] = Uloga::findOne(['ID' => Korisnik::findByUsername($model->username)->ID_Uloge])
        ->Naziv_Uloge;
      $response['userData']['ID'] = Korisnik::findByUsername($model->username)->ID_Uloge;
      return $response;
    } else {
      $response['status'] = '400';
      $response['errors'] = $model->getErrors();
      if (empty($response['errors'])) {
        $response['errors'] = "Unijeli ste krivo korisničko ime ili lozinku";
        return $response;
      }
      return $response;
    }
  }
}