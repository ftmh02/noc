<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPopsite */

$this->title = 'Update Tbl Popsite: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Popsites', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->PID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-popsite-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
