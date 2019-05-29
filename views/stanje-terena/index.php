<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stanje terena';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stanje-terena-index">

    <h1><?= Html::encode($this->title) ?></h1>

  <?php Pjax::begin(); ?>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      //'ID',
      'Opis',
      'Trajanje',
      'Broj_Vatrogasaca',
      'Broj_Vozila',
      //'ID_Korisnik',
      //'ID_Prijava',

      ['class' => 'yii\grid\ActionColumn',
        'template' => '{view}'],
    ],
  ]); ?>

  <?php Pjax::end(); ?>

</div>
