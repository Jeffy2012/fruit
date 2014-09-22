<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Varieties */

$this->title = 'Create Varieties';
$this->params['breadcrumbs'][] = ['label' => 'Varieties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="varieties-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
