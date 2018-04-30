<?php

namespace app\controllers;

use app\models\Products;
use Yii;
use Yii\web\Controller;

Class OrderController extends Controller{

    public function actionView($id)
    {
        $model = Products::findOne($id);
        if ($model === null) {
            throw new NotFoundHttpException;
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionIndex()
    {
        $models = Products::find()->all();

        //        return $this->render('index', array('models' => $models));
        \Yii::$app->response->data = $this->render('index', array('models' => $models));

    }

    public function actionSave($id=NULL)
    {
        if ($id == NULL)
            $model = new Order;
        else
            $model = $this->loadModel($id);

        if (isset($_POST['Orders']))
        {
            $model->load($_POST);

            if ($model->save())
            {
                Yii::$app->session->setFlash('success', 'Model has been saved');
                $this->createUrl('save', array('id' => $model->id));
                $this->redirect('orders/index');
            }
            else
                Yii::$app->session->setFlash('error', 'Model could not be saved');
        }

        \Yii::$app->response->data = $this->render('save', array('model' => $model));
    }
}