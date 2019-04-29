<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Prijava */

$this->title = 'Unos prijave';
$this->params['breadcrumbs'][] = ['label' => 'Prijave', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prijava-create">

    <h1><?= Html::encode($this->title) ?></h1>

  <?= $this->render('_form', [
    'model' => $model,
  ]) ?>

</div>
