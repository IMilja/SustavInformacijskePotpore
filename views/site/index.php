<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Sustav informacijske potpore</h1>

        <p class="lead">Aplikativno rješenje izgrađeno za kolegij "Programsko inženjerstvo"</p>

        <?php
            if(Yii::$app->user->isGuest){
              echo \yii\helpers\Html::beginForm(['/site/login'], 'post')
                .\yii\helpers\Html::submitButton('Login', ['class' => 'btn btn-lg btn-success']);
            }
            else{
                echo \yii\helpers\Html::beginForm(['/site/logout'], 'post')
                .\yii\helpers\Html::submitButton('Logout', ['class' => 'btn btn-lg btn-danger']);
            }
        ?>
    </div>

    </div>
</div>
