<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $status */
$this->title = $status ? '激活成功' : '激活失败';
?>
<div class="site-activate">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(!$status): ?>

        <p>
            您的激活没有成功, 你可以 <a href="<?= Url::to(['/user/send-activate-email'], true); ?>">重新发送激活邮件</a>
        </p>

        <code><?= Url::to(['/site/activation'], true); ?></code>
    <?php endif; ?>

</div>