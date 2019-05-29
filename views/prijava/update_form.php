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
  ?>

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'ID_Novost')->dropDownList(
          ArrayHelper::map(
                  Novost::find()->all(),
                  'ID',
            'Naslov'
          )
  )->label('Naslov novosti')?>

    <div class="form-group">
      <?= Html::submitButton('Spremi', ['class' => 'btn btn-success']) ?>
    </div>

  <?php ActiveForm::end(); ?>

</div>
