<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Harvests */

$this->title = 'Update Harvests: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Harvests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="harvests-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
