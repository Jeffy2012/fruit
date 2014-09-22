<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Harvest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="harvest-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tree_id')->textInput(['maxlength' => 8]) ?>

    <?= $form->field($model, 'harvest_date')->textInput() ?>

    <?= $form->field($model, 'output')->textInput() ?>

    <?= $form->field($model, 'single_max')->textInput() ?>

    <?= $form->field($model, 'single_min')->textInput() ?>

    <?= $form->field($model, 'output_amount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
