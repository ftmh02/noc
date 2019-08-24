<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TbltypeOfService */

$this->title = 'Update Tbltype Of Service: ' . $model->SID;
$this->params['breadcrumbs'][] = ['label' => 'Tbltype Of Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SID, 'url' => ['view', 'id' => $model->SID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbltype-of-service-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
