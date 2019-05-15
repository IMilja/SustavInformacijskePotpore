<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Novost */

$this->title = 'Ažuriranje novosti: ' . $model->Naslov;
$this->params['breadcrumbs'][] = ['label' => 'Novosti', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Naslov, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Ažuriranje';
?>
<div class="novost-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
