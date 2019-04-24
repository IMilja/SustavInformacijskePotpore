<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StanjeTerena */

$this->title = 'Update Stanje Terena: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Stanje Terenas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stanje-terena-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
