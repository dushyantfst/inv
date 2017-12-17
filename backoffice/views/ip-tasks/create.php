<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IpTasks */

$this->title = Yii::t('app', 'Create Ip Tasks');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ip Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

