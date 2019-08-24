<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\serviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbltype Of Services';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbltype-of-service-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbltype Of Service', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'SID',
            'typeName',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
