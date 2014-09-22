<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Estimate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estimate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'group_id')->textInput() ?>

    <?= $form->field($model, 'estimate_date')->textInput() ?>

    <?= $form->field($model, 'output_max')->textInput() ?>

    <?= $form->field($model, 'output_min')->textInput() ?>

    <?= $form->field($model, 'single_max')->textInput() ?>

    <?= $form->field($model, 'single_min')->textInput() ?>

    <?= $form->field($model, 'output_amount')->textInput() ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => 400]) ?>

    <?= $form->field($model, 'pick_times')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
