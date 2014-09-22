<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Variety */

$this->title = 'Create Variety';
$this->params['breadcrumbs'][] = ['label' => 'Varieties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="variety-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
        'list' => $list,
    ]) ?>

</div>
