<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Orchards */

$this->title = 'Create Orchards';
$this->params['breadcrumbs'][] = ['label' => 'Orchards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orchards-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
