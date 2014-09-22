<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Varieties */

$this->title = 'Update Varieties: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Varieties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="varieties-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
