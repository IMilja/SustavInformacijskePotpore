<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Korisnik */

$this->title = 'Update Korisnik: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Korisniks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="korisnik-update">

    <h1><?= Html::encode($this->title) ?></h1>

  <?= $this->render('_form', [
    'model' => $model,
  ]) ?>

</div>
