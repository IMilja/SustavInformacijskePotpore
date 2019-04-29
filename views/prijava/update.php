<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Prijava */

$this->title = 'Ažuriranje prijave: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Prijave', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Ažuriranje';
?>
<div class="prijava-update">

    <h1><?= Html::encode($this->title) ?></h1>

  <?= $this->render('_form', [
    'model' => $model,
  ]) ?>

</div>
