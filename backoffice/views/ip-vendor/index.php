<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\IpVendorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Vendors');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <h1>
        <span><?= Html::encode($this->title) ?></span>
        <div class="headerbar-item pull-right">
             <?= Html::a(Yii::t('app', 'Create Vendor'), ['create'], ['class' => 'btn btn-success']) ?>
            
        </div>
    </h1>

</div>

<div class="ip-vendor-index">

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vendor_id',
            'vendor_name',
            'vendor_address',
            'vendor_email:email',
            'vendor_phone',
            // 'vendor_pincode',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
