<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prijave';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prijava-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      <?= Html::a('Unos prijave', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

  <?php Pjax::begin(); ?>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      //'ID_Korisnik',
      'Vrijeme_Prijave',
      //'Odobreno',
      [
        'attribute' => 'Stanje prijave',
        'value' => function ($model) {return $model->Odobreno === 1 ? 'Odobreno' : 'Nije odobreno';},
      ],
      'Vrijeme_Odobrenja',
      //'ID',
      //'Opis',
      //'Lat',
      //'Long',
      //'ID_Novost',

      ['class' => 'yii\grid\ActionColumn'],
    ],
  ]); ?>

  <?php Pjax::end(); ?>

</div>
