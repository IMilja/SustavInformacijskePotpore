<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Novost */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Novosti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="novost-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      <?= Html::a('Ažuriranje', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
      <?= Html::a('Brisanje', ['delete', 'id' => $model->ID], [
        'class' => 'btn btn-danger',
        'data' => [
          'confirm' => 'Jeste li sigurni da želite izbrisati ovu stavku?',
          'method' => 'post',
        ],
      ]) ?>
    </p>

  <?= DetailView::widget([
  //Todo: Implement ime and prezime to show as author
    'model' => $model,
    'attributes' => [
      //'ID',
      'Opis',
      'Vrijeme_Objave',
      [
        'attribute' => "Autor",
        'value' => ""
      ],
    ],
  ]) ?>

</div>
