<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Novost */

$this->title = 'Unos novosti';
$this->params['breadcrumbs'][] = ['label' => 'Novosti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="novost-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
