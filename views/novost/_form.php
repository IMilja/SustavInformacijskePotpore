<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Novost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="novost-form">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'Opis')->textarea(['maxlength' => true])->label('Opis novosti') ?>

    <div class="form-group">
      <?= Html::submitButton('Spremi', ['class' => 'btn btn-success']) ?>
    </div>

  <?php ActiveForm::end(); ?>

</div>
