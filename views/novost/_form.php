<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Novost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="novost-form">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'Opis')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'Vrijeme_Objave')->textInput() ?>

  <?= $form->field($model, 'ID_Korisnik')->textInput() ?>

    <div class="form-group">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

  <?php ActiveForm::end(); ?>

</div>
