<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receivers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receiver-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Receiver', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'receiver_name',
            'phone_number',
            'state',
            // 'province',
            // 'city',
            // 'district',
            // 'street',
            // 'postal_code',
            // 'is_default',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
