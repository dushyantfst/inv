<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\IpTasks */

$this->title = $model->task_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ip Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="container">
    <h1>
        <span><?= Html::encode($this->title) ?></span>
        <div class="headerbar-item pull-right">
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->task_id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->task_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
            <?= Html::a('Go Back', ['/ip-tasks/index'], ['class' => 'btn btn-warning']) ?>


        </div>
    </h1>

</div>
<div class="ip-tasks-view">


    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'task_id',
            'project_id',
            'task_name:ntext',
            'task_description:ntext',
            'task_price',
            'task_start_date',
            'task_finish_date',
            'task_status',
            'tax_rate_id',
        ],
    ])
    ?>

</div>
