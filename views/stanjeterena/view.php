<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StanjeTerena */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Stanje Terenas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="stanje-terena-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
      <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
        'class' => 'btn btn-danger',
        'data' => [
          'confirm' => 'Are you sure you want to delete this item?',
          'method' => 'post',
        ],
      ]) ?>
    </p>

  <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
      'ID',
      'Opis',
      'Trajanje',
      'Broj_Vatrogasaca',
      'Broj_Vozila',
      'ID_Korisnik',
      'ID_Prijava',
    ],
  ]) ?>

</div>
