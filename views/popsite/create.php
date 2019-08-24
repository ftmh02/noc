<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPopsite */

$this->title = 'Create Tbl Popsite';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Popsites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-popsite-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
