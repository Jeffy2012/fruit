<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user */
$this->title = '邮件发送成功';
?>
<div class="site-send-email">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        请到你的邮箱<?= $user->email ?>查收邮件。
    </p>

</div>
