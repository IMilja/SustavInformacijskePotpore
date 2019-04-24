<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Prijava */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Prijavas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="prijava-view">

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
      'Vrijeme_Prijave',
      'Lat',
      'Long',
      'Odobreno',
      'Vrijeme_Odobrenja',
      'ID_Novost',
      'ID_Korisnik',
    ],
  ]) ?>

</div>
