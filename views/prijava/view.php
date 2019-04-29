<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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
      <?= Html::a('Ažuriranje', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
      <?= Html::a('Brisanje', ['delete', 'id' => $model->ID], [
        'class' => 'btn btn-danger',
        'data' => [
          'confirm' => 'Dali ste sigurni da želite izbrisati ovu stavku?',
          'method' => 'post',
        ],
      ]) ?>
    </p>

  <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
      //'ID',
      'Opis',
      'Vrijeme_Prijave',
      'Lat',
      'Long',
      'Odobreno',
      'Vrijeme_Odobrenja',
      //'ID_Novost',
      //'ID_Korisnik',
    ],
  ]) ?>

</div>
