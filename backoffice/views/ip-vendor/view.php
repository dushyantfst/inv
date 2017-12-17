<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\IpVendor */

$this->title = $model->vendor_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ip Vendors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <h1>
        <span><?= Html::encode($this->title) ?></span>
        <div class="headerbar-item pull-right">
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->vendor_id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->vendor_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
            <?= Html::a('Go Back', ['/ip-vendor/index'], ['class' => 'btn btn-warning']) ?>
        </div>
    </h1>

</div>
<div class="ip-vendor-view">


    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'vendor_id',
            'vendor_name',
            'vendor_address',
            'vendor_email:email',
            'vendor_phone',
            'vendor_pincode',
        ],
    ])
    ?>

</div>
