<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IpVendor */
/* @var $form yii\widgets\ActiveForm */
?>



<?php $form = ActiveForm::begin(); ?>


<div class="container">
    <h1>
        <span><?= Html::encode($this->title) ?></span>
        <div class="headerbar-item pull-right">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

            <?= Html::a('Go Back', ['/ip-vendor/index'], ['class' => 'btn btn-warning', 'id' => 'goBack']) ?>
        </div>
    </h1>

</div>
<div class="headerbar">
    <h1 class="headerbar-title"></h1>



</div>

<div class="col-xs-12 col-sm-6 ">
    <div class="panel panel-default">
        <div class="panel-heading">
            Task information                    
        </div>

        <div class="panel-body">

            <?= $form->field($model, 'vendor_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'vendor_address')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'vendor_pincode')->textInput() ?>

        </div>

    </div>
</div>


<div class="col-xs-12 col-sm-6 ">
    <div class="panel panel-default">
        <div class="panel-heading">
            Task Status
        </div>

        <div class="panel-body">

            <?= $form->field($model, 'vendor_email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'vendor_phone')->textInput(['maxlength' => true]) ?>


        </div>

    </div>
</div>
<?php ActiveForm::end(); ?>

