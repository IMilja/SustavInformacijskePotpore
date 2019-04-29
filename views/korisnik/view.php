<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Korisnik */

$this->title = $model->Korisnicko_Ime;
$this->params['breadcrumbs'][] = ['label' => 'Korisnici', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="korisnik-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      <?= Html::a('Ažuriranje', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
      <?= Html::a('Brisanje', ['delete', 'id' => $model->ID], [
        'class' => 'btn btn-danger',
        'data' => [
          'confirm' => 'Jeste li sigurni da želite izbrisati ovu stavku?',
          'method' => 'post',
        ],
      ]) ?>
    </p>

  <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
      'Ime',
      'Prezime',
      'EMail:email',
      'Broj_Mobitela',
      'OIB',
      [
        'attribute' => 'Uloga',
        'value' => $model->uloge->Naziv_Uloge
      ],
      //'accessToken',
      //'authKey',
      //'Lozinka',
      //'Korisnicko_Ime',
      //'ID',
    ],
  ]) ?>

</div>
