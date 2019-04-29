<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Uloga */

$this->title = 'Unos uloge';
$this->params['breadcrumbs'][] = ['label' => 'Uloge', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uloga-create">

    <h1><?= Html::encode($this->title) ?></h1>

  <?= $this->render('_form', [
    'model' => $model,
  ]) ?>

</div>
