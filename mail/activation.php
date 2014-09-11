<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $user app\models\User */

$this->title = '激活邮件';
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <a href="<?= Url::to(['/site/activation', 'id' => $user->id, 'key' => $user->authKey], true); ?>" target="_blank">
        <?= Url::to(['/site/activation', 'id' => $user->id, 'key' => $user->authKey], true); ?>
    </a>
</div>
