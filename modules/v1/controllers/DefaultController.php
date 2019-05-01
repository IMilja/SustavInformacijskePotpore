<?php


namespace app\modules\v1\controllers;


use Yii;
use yii\rest\Controller;
use yii\web\Response;

class DefaultController extends Controller
{
  public function actionIndex()
  {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $data = ['Vrijednost' => 'Test', 'Opis' => 'TestTest'];
    return $data;
  }
}