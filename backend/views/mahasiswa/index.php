<?php

use common\models\Mahasiswa;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var \common\models\MahasiswaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Mahasiswa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mahasiswa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

        <?= Html::a('Tambah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nim',
            'nama',
            [ 
                'attribute' => 'prodi.nama_prodi',
                'header' => 'Prodi',
                'value' => function($model, $key, $index, 
$column) {
                    return $model->prodi->nama_prodi;
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Mahasiswa 
$model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_mahasiswa' 
=> $model->id_mahasiswa]);
                 }
            ],
        ],
    ]); ?>
</div>
</div>