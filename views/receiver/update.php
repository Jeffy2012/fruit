<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Receiver */

$this->title = 'Update Receiver: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Receivers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="receiver-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
