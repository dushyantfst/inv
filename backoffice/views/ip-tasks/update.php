<?php

use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\IpTasks */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
            'modelClass' => 'Ip Tasks',
        ]) . $model->task_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ip Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->task_name, 'url' => ['view', 'id' => $model->task_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>




<?=
$this->render('_form', [
    'model' => $model,
])
?>

<?php

$script = <<< JS
$(document).ready(function(){
    $('#goBack').click(function(){
        console.log("----- Go Back Clicked--------" );
        dataAlert();
    });
}); 
JS;
$this->registerJs($script, View::POS_END);



?>
<?php $this->registerJsFile('js/index.js', ['depends' => [yii\web\JqueryAsset::className()]]); ?> 