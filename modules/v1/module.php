<?php

namespace app\modules\v1;

use app\models\Korisnik;
use Yii;
use yii\filters\auth\HttpBearerAuth;
use yii\web\Response;

/**
 * v1 module definition class
 */
class module extends \yii\base\Module
{
  /**
   * {@inheritdoc}
   */
  public $controllerNamespace = 'app\modules\v1\controllers';

  public function behaviors()
  {
    $behaviors = parent::behaviors();
    $behaviors['authenticator'] = [
      'class' => HttpBearerAuth::className(),
      'except' => ['auth/login', 'auth/signup'],
    ];
    $behaviors['contentNegotiator'] = [
      'class' => 'yii\filters\ContentNegotiator',
      'formats' => [
        'application/json' => Response::FORMAT_JSON,
      ],
    ];
    return $behaviors;
  }

  /**
   * {@inheritdoc}
   */
  public function init()
  {
    parent::init();
    Yii::$app->user->enableSession = false;
    Yii::$app->response->format = 'json';
    // custom initialization code goes here
  }
}
