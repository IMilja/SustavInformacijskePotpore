<?php

use app\models\Uloga;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Korisnik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="korisnik-form">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'EMail')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'Broj_Mobitela')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'ID_Uloge')->dropDownList(
  //ToDo: Add default value to Uloga select
    ArrayHelper::map(Uloga::find()->all(),
      'ID',
      'Naziv_Uloge')
  )->label('Uloga'); ?>

    <div class="form-group">
      <?= Html::submitButton('Spremi', ['class' => 'btn btn-success']) ?>
    </div>

  <?php ActiveForm::end(); ?>

</div>
