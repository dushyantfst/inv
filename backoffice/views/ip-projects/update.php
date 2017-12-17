<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IpProjects */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Ip Projects',
]) . $model->project_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ip Projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->project_id, 'url' => ['view', 'id' => $model->project_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ip-projects-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
