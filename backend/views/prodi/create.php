<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Prodi $model */

$this->title = 'Tambah Prodi';
$this->params['breadcrumbs'][] = ['label' => 'Prodi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prodi-create">
 
<h1><?= Html::encode($this->title) ?></h1>
 
<?= $this->render('_form', [
    'model' => $model,
 ]) ?>

 </div>