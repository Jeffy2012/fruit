<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Orchards */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orchards-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'orchard_name')->textInput(['maxlength' => 40]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'user_id')->textInput(['maxlength' => 8]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'district')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'postal_code')->textInput(['maxlength' => 10]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
