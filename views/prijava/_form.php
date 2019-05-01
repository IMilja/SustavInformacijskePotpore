<?php

use app\models\Novost;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Prijava */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prijava-form">
  <?php
  //ToDo: Remove all fields until we create the API for Prijava Entry
  //ToDo: Add a more descriptive dropdown text
  ?>

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'Opis')->textarea(['maxlength' => true]) ?>

  <?= $form->field($model, 'Vrijeme_Prijave')->textInput() ?>

  <?= $form->field($model, 'Lat')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'Long')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'Odobreno')->textInput() ?>

  <?= $form->field($model, 'Vrijeme_Odobrenja')->textInput() ?>

  <?= $form->field($model, 'ID_Novost')->dropDownList(
          ArrayHelper::map(
                  Novost::find()->all(),
                  'ID',
            'Vrijeme_Objave'
          )
  )->label('Vrijeme objave')?>

  <?= $form->field($model, 'ID_Korisnik')->textInput() ?>

    <div class="form-group">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

  <?php ActiveForm::end(); ?>

</div>
