<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StanjeTerena */

$this->title = 'Create Stanje Terena';
$this->params['breadcrumbs'][] = ['label' => 'Stanje Terenas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stanje-terena-create">

    <h1><?= Html::encode($this->title) ?></h1>

  <?= $this->render('_form', [
    'model' => $model,
  ]) ?>

</div>
