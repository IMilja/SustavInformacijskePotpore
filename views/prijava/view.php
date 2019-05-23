<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\overlays\InfoWindow;

/* @var $this yii\web\View */
/* @var $model app\models\Prijava */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Prijave', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="prijava-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      <?= Html::a('Odobri prijavu', ['approve', 'id' => $model->ID],
        [
          'class' => 'btn btn-success', 'disabled' => $model->Odobreno != null ? true : false
        ])
      ?>
      <?= Html::a('Ne odobri prijavu', ['disapprove', 'id' => $model->ID],
        [
          'class' => 'btn btn-danger', 'disabled' => $model->Odobreno != null ? true : false
        ])
      ?>
    </p>

  <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
      //'ID',
      'Opis',
      'Vrijeme_Prijave',
      'Lat',
      'Long',
      [
        'attribute' => 'Stanje prijave',
        'value' => ($model->Odobreno === 1 ? 'Odobreno' : 'Nije odobreno'),
      ],
      'Vrijeme_Odobrenja',
      //'ID_Novost',
      //'ID_Korisnik',
      [
        'attribute' => 'Podnositelj zahtjeva',
        'value' => $model->korisnik->Ime . ' ' . $model->korisnik->Prezime,
      ],
    ],
  ]) ?>


  <?php
  $coords = new LatLng(['lat' => $model->Lat, 'lng' => $model->Long]);
  $map = new Map([
    'center' => $coords,
    'zoom' => 16,
    'width' => '100%'
  ]);

  $marker = new Marker([
    'position' => $coords,
    'title' => $model->korisnik->Ime . ' ' . $model->korisnik->Prezime,
  ]);

  $marker->attachInfoWindow(
    new InfoWindow([
      'content' => $model->Opis
    ])
  );

  $map->addOverlay($marker);

  echo '<div style="width: 100%;">';
  echo $map->display();
  echo '</div>';
  ?>
</div>
