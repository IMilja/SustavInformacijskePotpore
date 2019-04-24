<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Korisnik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="korisnik-form">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'Korisnicko_Ime')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'Lozinka')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'EMail')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'Ime')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'Prezime')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'Broj_Mobitela')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'OIB')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'authKey')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'accessToken')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'ID_Uloge')->textInput() ?>

    <div class="form-group">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

  <?php ActiveForm::end(); ?>

</div>
