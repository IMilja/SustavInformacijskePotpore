<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Korisniks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="korisnik-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      <?= Html::a('Create Korisnik', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

  <?php Pjax::begin(); ?>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      'ID',
      'Korisnicko_Ime',
      'Lozinka',
      'EMail:email',
      'Ime',
      //'Prezime',
      //'Broj_Mobitela',
      //'OIB',
      //'authKey',
      //'accessToken',
      //'ID_Uloge',

      ['class' => 'yii\grid\ActionColumn'],
    ],
  ]); ?>

  <?php Pjax::end(); ?>

</div>
