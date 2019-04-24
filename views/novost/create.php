<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Novost */

$this->title = 'Create Novost';
$this->params['breadcrumbs'][] = ['label' => 'Novosts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="novost-create">

    <h1><?= Html::encode($this->title) ?></h1>

  <?= $this->render('_form', [
    'model' => $model,
  ]) ?>

</div>
