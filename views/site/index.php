<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'FRUIT';
?>
<div class="site-index">
    <?= Html::a('种类列表', ['category/'], ['class' => 'btn btn-default']) ?>
    <?= Html::a('创建种类', ['category/create'], ['class' => 'btn btn-default']) ?>
    <?= Html::a('品种列表', ['variety/'], ['class' => 'btn btn-default']) ?>
    <?= Html::a('创建品种', ['variety/create'], ['class' => 'btn btn-default']) ?>
    <?= Html::a('果园列表', ['orchard/'], ['class' => 'btn btn-default']) ?>
    <?= Html::a('创建果园', ['orchard/create'], ['class' => 'btn btn-default']) ?>
</div>
