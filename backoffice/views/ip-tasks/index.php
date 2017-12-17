<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IpTasksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ip Tasks');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="container">
    <h1>
        <span><?= Html::encode($this->title) ?></span>
        <div class="headerbar-item pull-right">
             <?= Html::a(Yii::t('app', 'Create Ip Tasks'), ['create'], ['class' => 'btn btn-success']) ?>
            
        </div>
    </h1>

</div>

<div class="ip-tasks-index">

   
<?php //  echo $this->render('_search', ['model' => $searchModel]);  ?>

    
    <?php Pjax::begin(); ?>    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'task_id',
//            'project_id',
            'task_name:ntext',
            'task_description:ntext',
            'task_price',
//            'task_finish_date',
            // 'task_status',
            // 'tax_rate_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
<?php Pjax::end(); ?></div>
