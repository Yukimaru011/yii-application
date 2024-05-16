<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var \common\models\MahasiswaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="mahasiswa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
 
    <?= $form->field($model, 'id_mahasiswa') ?>
 
    <?= $form->field($model, 'nim') ?>
 
    <?= $form->field($model, 'nama') ?>
 
    <?= $form->field($model, 'id_prodi') ?>
 
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>
 
    <?php ActiveForm::end(); ?>

</div>