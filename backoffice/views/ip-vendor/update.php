<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IpVendor */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Ip Vendor',
]) . $model->vendor_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ip Vendors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vendor_id, 'url' => ['view', 'id' => $model->vendor_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ip-vendor-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
