<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StanjeTerena */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stanje-terena-form">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'Opis')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'Trajanje')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'Broj_Vatrogasaca')->textInput() ?>

  <?= $form->field($model, 'Broj_Vozila')->textInput() ?>

  <?= $form->field($model, 'ID_Korisnik')->textInput() ?>

  <?= $form->field($model, 'ID_Prijava')->textInput() ?>

    <div class="form-group">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

  <?php ActiveForm::end(); ?>

</div>
