<?php

namespace app\controllers;

use app\models\Products;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\HttpException;
use yii\helpers\Html;

class ProductController extends Controller
{

    public function actionIndex()
    {
        $models = Products::find()->all();

        //        return $this->render('index', array('models' => $models));
        \Yii::$app->response->data = $this->render('index', array('models' => $models));

    }

    private function loadModel($id)
    {
        $model = Products::find()->where(['id' => $id])->one();

        if ($model == NULL)
            throw new HttpException(404, 'Model not found.');

        return $model;
    }

    public function actionDelete($id = NULL){
        $model =  $this->loadModel($id);

        if(!$model->delete())
            Yii::$app->session->setFlash('error', 'Unable to delete model');

        $this->redirect('products/index');

    }

    public function actionSave($id=NULL)
    {
        if ($id == NULL)
            $model = new Products;
        else
            $model = $this->loadModel($id);

        if (isset($_POST['Products']))
        {
            $model->load($_POST);

            if ($model->save())
            {
                Yii::$app->session->setFlash('success', 'Model has been saved');
                $this->redirect($this->createUrl('save', array('id' => $model->id)));
                $this->redirect('site/index');
            }
            else
                Yii::$app->session->setFlash('error', 'Model could not be saved');
        }

        \Yii::$app->response->data = $this->render('save', array('model' => $model));
    }
}