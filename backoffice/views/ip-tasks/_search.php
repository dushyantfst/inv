<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IpTasksSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ip-tasks-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'task_id') ?>

    <?= $form->field($model, 'project_id') ?>

    <?= $form->field($model, 'task_name') ?>

    <?= $form->field($model, 'task_description') ?>

    <?= $form->field($model, 'task_price') ?>

    <?php // echo $form->field($model, 'task_finish_date') ?>

    <?php // echo $form->field($model, 'task_status') ?>

    <?php // echo $form->field($model, 'tax_rate_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
