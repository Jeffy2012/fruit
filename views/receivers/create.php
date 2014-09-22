<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Receivers */

$this->title = 'Create Receivers';
$this->params['breadcrumbs'][] = ['label' => 'Receivers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receivers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
