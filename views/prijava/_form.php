<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Prijava */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prijava-form">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'Opis')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'Vrijeme_Prijave')->textInput() ?>

  <?= $form->field($model, 'Lat')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'Long')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'Odobreno')->textInput() ?>

  <?= $form->field($model, 'Vrijeme_Odobrenja')->textInput() ?>

  <?= $form->field($model, 'ID_Novost')->textInput() ?>

  <?= $form->field($model, 'ID_Korisnik')->textInput() ?>

    <div class="form-group">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

  <?php ActiveForm::end(); ?>

</div>
