<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Korisnici';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="korisnik-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      <?= Html::a('Unos korisnika', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

  <?php Pjax::begin(); ?>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      'Ime',
      'Prezime',
      'EMail:email',
      'Broj_Mobitela',
      //'ID',
      //'Lozinka',
      //'Korisnicko_Ime',
      //'OIB',
      //'authKey',
      //'accessToken',
      //'ID_Uloge',

      ['class' => 'yii\grid\ActionColumn'],
    ],
  ]); ?>

  <?php Pjax::end(); ?>

</div>
