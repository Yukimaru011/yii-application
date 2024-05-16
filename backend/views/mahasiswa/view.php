<?php

    use yii\helpers\Html;
    use yii\widgets\DetailView;
    /** @var yii\web\View $this */
    /** @var common\models\Mahasiswa $model */

    $this->title = $model->id_mahasiswa;
    $this->params['breadcrumbs'][] = ['label' => 'Mahasiswa', 
    'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    \yii\web\YiiAsset::register($this);
    ?>
    <div class="mahasiswa-view">
 
        <h1><?= Html::encode($this->title) ?></h1>
 
        <p>
            <?= Html::a('Update', ['update', 'id_mahasiswa' => 
    $model->id_mahasiswa], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id_mahasiswa' => 
    $model->id_mahasiswa], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
 
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id_mahasiswa',
                'nim',
                'nama',
                'prodi.nama_prodi',
            ],
        ]) ?>

</div>