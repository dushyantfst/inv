<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\IpProjects;
use app\models\IpTaskStatus;
use app\models\IpTaxRates;
use yii\helpers\ArrayHelper;
use app\models\IpVendor;

//use nex\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\IpTasks */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>


<div class="container">
    <h1>
        <span><?= Html::encode($this->title) ?></span>
        <div class="headerbar-item pull-right">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

            <?= Html::a('Go Back', ['/ip-tasks/index'], ['class' => 'btn btn-warning', 'id' => 'goBack']) ?>
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

            <?php
            // get all product types from the corresponding table:
            $productTypes = IpProjects::find()->orderBy('project_name')->all();
            $query = IpProjects::find()->where(['project_id' => 1]);
            // create an array of pairs ('id', 'type-name'):
            $productTypeList = ArrayHelper::map($productTypes, 'project_id', 'project_name');
            // finally create the drop-down list:
            echo $form->field($model, 'project_id')->dropDownList($productTypeList);

//            $form->field($model, 'project_id')->textInput()
            ?>

            <?= $form->field($model, 'task_name')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'task_description')->textarea(['rows' => 6]) ?>




        </div>

    </div>
</div>


<div class="col-xs-12 col-sm-6 ">
    <div class="panel panel-default">
        <div class="panel-heading">
            Task Status
        </div>

        <div class="panel-body">

            <?= $form->field($model, 'task_price')->textInput(['maxlength' => true]) ?>

            <?=
            $form->field($model, 'task_start_date')->widget(\yii\jui\DatePicker::classname(), [
                //'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd',
                'options' => ['class' => 'form-control'],
            ]);
//            $form->field($model, 'task_finish_date')->textInput() 
            ?>
            <?=
            $form->field($model, 'task_finish_date')->widget(\yii\jui\DatePicker::classname(), [
                //'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd',
                'options' => ['class' => 'form-control'],
            ]);
//, ['class' => 'form-control']
            ?>
            <?php
            // get all product types from the corresponding table:
            $IpTaskStatus = IpTaskStatus::find()->orderBy('task_status_name')->all();
            // create an array of pairs ('id', 'type-name'):
            $IpTaskStatusList = ArrayHelper::map($IpTaskStatus, 'task_status_id', 'task_status_name');
            // finally create the drop-down list:
            echo $form->field($model, 'task_status')->dropDownList($IpTaskStatusList);
//            $form->field($model, 'task_status')->textInput() 
            ?>

            <?php
            // get all product types from the corresponding table:
            $IpTaxRates = IpTaxRates::find()->orderBy('tax_rate_name')->all();
            // create an array of pairs ('id', 'type-name'):
            $IpTaxRatesList = ArrayHelper::map($IpTaxRates, 'tax_rate_id', 'tax_rate_name');
            // finally create the drop-down list:
            echo $form->field($model, 'tax_rate_id')->dropDownList($IpTaxRatesList);


//            $form->field($model, 'tax_rate_id')->textInput()
            ?>

            <?php
            // get all product types from the corresponding table:
            $IpVendor = IpVendor::find()->orderBy('vendor_name')->all();
            // create an array of pairs ('id', 'type-name'):
            $IpVendorList["None"] = "---Select One---";
            $IpVendorList = ArrayHelper::map($IpVendor, 'vendor_name', 'vendor_name');
            // finally create the drop-down list:
            echo $form->field($model, 'task_assigned')->dropDownList($IpVendorList);
            ?>
        </div>

    </div>
</div>
<?php ActiveForm::end(); ?>