<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\Mahasiswa $model */
/** @var common\models\Mahasiswa $datProdi */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="mahasiswa-form">

    <?php $form = ActiveForm::begin(); ?>
 
    <?= $form->field($model, 'nim')->textInput(['maxlength' => 
true]) ?>
 
    <?= $form->field($model, 'nama')->textInput(['maxlength' => 
true]) ?>
    <?php
 
$dataPost=ArrayHelper::map(\common\models\Prodi::find()->asArray()->all(), 'id_prodi', 'nama_prodi');
    echo $form->field($model, 'id_prodi')
        ->dropDownList(
            $dataPost,
            ['id_prodi'=>'nama_prodi']
        );
    ?>
 
    <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btnsuccess']) ?>
 </div>
 
    <?php ActiveForm::end(); ?>

</div>