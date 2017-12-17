<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IpVendor */

$this->title = Yii::t('app', 'Create Ip Vendor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ip Vendors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ip-vendor-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
