<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Korisnik */

$this->title = 'Registriraj korisnika';
$this->params['breadcrumbs'][] = ['label' => 'Korisnici', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="korisnik-create">

    <h1><?= Html::encode($this->title) ?></h1>

  <?= $this->render('_form', [
    'model' => $model,
  ]) ?>

</div>
