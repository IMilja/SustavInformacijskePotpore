<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Novosts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="novost-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      <?= Html::a('Create Novost', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

  <?php Pjax::begin(); ?>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      'ID',
      'Opis',
      'Vrijeme_Objave',
      'ID_Korisnik',

      ['class' => 'yii\grid\ActionColumn'],
    ],
  ]); ?>

  <?php Pjax::end(); ?>

</div>
