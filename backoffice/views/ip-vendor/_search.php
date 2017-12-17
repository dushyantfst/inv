<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IpVendorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ip-vendor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vendor_id') ?>

    <?= $form->field($model, 'vendor_name') ?>

    <?= $form->field($model, 'vendor_address') ?>

    <?= $form->field($model, 'vendor_email') ?>

    <?= $form->field($model, 'vendor_phone') ?>

    <?php // echo $form->field($model, 'vendor_pincode') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
