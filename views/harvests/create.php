<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Harvests */

$this->title = 'Create Harvests';
$this->params['breadcrumbs'][] = ['label' => 'Harvests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="harvests-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
