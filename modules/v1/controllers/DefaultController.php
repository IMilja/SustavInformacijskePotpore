<?php


namespace app\modules\v1\controllers;


use yii\rest\Controller;

class DefaultController extends Controller
{
  public function actionIndex()
  {
    $data = ['Vrijednost' => 'Test', 'Opis' => 'TestTest'];
    return $data;
  }
}