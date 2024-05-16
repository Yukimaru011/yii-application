<?php

namespace backend\controllers;

use common\models\Prodi;
use common\models\ProdiSearch;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ProdiController extends Controller
{
        public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                '       delete' => ['POST'],
                    ],
                ],
            ]
        );
    }
    public function actionIndex()
    {
        $searchModel = new ProdiSearch();
        $dataProvider = 
$searchModel->search($this->request->queryParams);
    
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
   
    public function actionView($id_prodi)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_prodi),
        ]);
    }
    
    public function actionCreate()
    {
        $model = new Prodi();
    
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && 
$model->save()) {
                return $this->redirect(['view', 'id_prodi' => 
$model->id_prodi]);
            }
        } else {
            $model->loadDefaultValues();
        }
    
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    
    public function actionUpdate($id_prodi)
    {
        $model = $this->findModel($id_prodi);
    
        if ($this->request->isPost && 
$model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_prodi' => 
$model->id_prodi]);
        }
    
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    public function actionDelete($id_prodi)
    {
        $this->findModel($id_prodi)->delete();
        
        return $this->redirect(['index']);
    }
        protected function findModel($id_prodi)
    {
        if (($model = Prodi::findOne(['id_prodi' => 
$id_prodi])) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
       