<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TbltypeOfService */

$this->title = 'Create Tbltype Of Service';
$this->params['breadcrumbs'][] = ['label' => 'Tbltype Of Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbltype-of-service-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
