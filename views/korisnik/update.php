<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Korisnik */

$this->title = 'Azuriranje korisnika: ' . $model->Korisnicko_Ime;
$this->params['breadcrumbs'][] = ['label' => 'Korisnici', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Korisnicko_Ime, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Ažuriranje';
?>
<div class="korisnik-update">

    <h1><?= Html::encode($this->title) ?></h1>

  <?= $this->render('update_form', [
    'model' => $model,
  ]) ?>

</div>
