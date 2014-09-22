<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orchards';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orchards-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Orchards', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'orchard_name',
            'description',
            'user_id',
            'state',
            // 'province',
            // 'city',
            // 'district',
            // 'street',
            // 'postal_code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
