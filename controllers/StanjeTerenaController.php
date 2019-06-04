<?php

namespace app\controllers;

use Yii;
use app\models\StanjeTerena;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * StanjeTerenaController implements the CRUD actions for StanjeTerena model.
 */
class StanjeTerenaController extends Controller
{
  /**
   * {@inheritdoc}
   */
  public function behaviors()
  {
    return [
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'delete' => ['POST'],
        ],
      ],
      'access' => [
        'class' => AccessControl::className(),
        'only' => [
          'create',
          'update',
          'view',
          'index',
          'delete'
        ],
        'rules' => [
          [
            'allow' => true,
            'roles' => ['@']
          ],
        ],
      ],
    ];
  }

  /**
   * Lists all StanjeTerena models.
   * @return mixed
   */
  public function actionIndex()
  {
    $dataProvider = new ActiveDataProvider([
      'query' => StanjeTerena::find(),
    ]);

    return $this->render('index', [
      'dataProvider' => $dataProvider,
    ]);
  }

  /**
   * Displays a single StanjeTerena model.
   * @param integer $id
   * @return mixed
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionView($id)
  {
    return $this->render('view', [
      'model' => $this->findModel($id),
    ]);
  }

  /**
   * Creates a new StanjeTerena model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   * @return mixed
   * @throws NotFoundHttpException
   */
  public function actionCreate()
  {
    throw new NotFoundHttpException('The requested page does not exist.');
  }

  /**
   * Updates an existing StanjeTerena model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id
   * @return mixed
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionUpdate($id)
  {
    throw new NotFoundHttpException('The requested page does not exist.');
  }

  /**
   * Deletes an existing StanjeTerena model.
   * If deletion is successful, the browser will be redirected to the 'index' page.
   * @param integer $id
   * @return mixed
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionDelete($id)
  {
    $this->findModel($id)->delete();

    return $this->redirect(['index']);
  }

  /**
   * Finds the StanjeTerena model based on its primary key value.
   * If the model is not found, a 404 HTTP exception will be thrown.
   * @param integer $id
   * @return StanjeTerena the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected function findModel($id)
  {
    if (($model = StanjeTerena::findOne($id)) !== null) {
      return $model;
    }

    throw new NotFoundHttpException('The requested page does not exist.');
  }
}
