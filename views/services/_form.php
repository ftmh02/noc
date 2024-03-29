<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TbltypeOfService */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbltype-of-service-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'typeName')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
