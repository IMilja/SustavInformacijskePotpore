<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StanjeTerena */

$this->title = $model->Opis;
$this->params['breadcrumbs'][] = ['label' => 'Stanje Terena', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="stanje-terena-view">

    <h1><?= Html::encode($this->title) ?></h1>

  <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
      //'ID',
      'Opis',
      ['attribute' => 'Trajanje',
        'value' => $model->Trajanje. ' min'],
      'Broj_Vatrogasaca',
      'Broj_Vozila',
      [
        'attribute' => 'Prijavio stanje terena',
        'value' => $model->korisnik->Ime . ' ' . $model->korisnik->Prezime,
      ],
      [
        'attribute' => 'Opis prijave',
        'value' => ($model->ID_Korisnik == null ? '' : $model->prijava->Opis),
      ],
    ],
  ]) ?>

</div>
