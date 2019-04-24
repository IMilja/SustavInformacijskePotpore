<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Uloga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uloga-form">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'Naziv_Uloge')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

  <?php ActiveForm::end(); ?>

</div>
