<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Harvests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="harvests-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Harvests', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tree_id',
            'harvest_date',
            'output',
            'single_max',
            // 'single_min',
            // 'output_amount',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
