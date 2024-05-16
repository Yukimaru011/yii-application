<?php

namespace backend\controllers;

use common\models\Mahasiswa;
use common\models\MahasiswaSearch;
use common\models\Prodi;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class MahasiswaController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
 );
 }

 public function actionIndex()
 {
    $searchModel = new MahasiswaSearch();
    $dataProvider = 
$searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id_mahasiswa)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_mahasiswa),
        ]);
    }

    public function actionCreate()
    {
        $model = new Mahasiswa();
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && 
$model->save()) {
                return $this->redirect(['view', 'id_mahasiswa' => 
$model->id_mahasiswa]);
            }
        } else {
            $model->loadDefaultValues();
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id_mahasiswa)
    {
        $model = $this->findModel($id_mahasiswa);
        if ($this->request->isPost && 
$model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_mahasiswa' => 
$model->id_mahasiswa]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id_mahasiswa)
    {
        $this->findModel($id_mahasiswa)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id_mahasiswa)
    {
        if (($model = Mahasiswa::findOne(['id_mahasiswa' => 
$id_mahasiswa])) !== null) {
             return $model;
        }
        throw new NotFoundHttpException('The requested page does 
not exist.');
    }
}

