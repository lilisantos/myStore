<?php

namespace app\controllers;

use app\models\Orders;
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
use yii\db\ActiveRecord;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

Class OrderController extends Controller{

    public function actionView($id)
    {
        $model = Orders::findOne($id);
        if ($model === null) {
            throw new NotFoundHttpException;
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionIndex()
    {
        $models = Orders::find()->all();

        //        return $this->render('index', array('models' => $models));
        \Yii::$app->response->data = $this->render('index', array('models' => $models));

    }

    public function actionSave($id=NULL)
    {
        /*$products = new ActiveDataProvider([
            'query' => Products::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        echo ListView::widget([
            'dataProvider' => $products,
            'itemView' => '/order/save',
        ]);*/

        $products = Products::find()->select(['id', 'name'])->all();

        if ($id == NULL)
            $model = new Orders();
        else
            $model = $this->loadModel($id);

        if (isset($_POST['Orders']))
        {
            $model->load($_POST);

            if ($model->save())
            {
                Yii::$app->session->setFlash('success', 'Model has been saved');
                $this->createUrl('save', array('id' => $model->id));
                $this->redirect('order/index');
            }
            else
                Yii::$app->session->setFlash('error', 'Model could not be saved');
        }

        \Yii::$app->response->data = $this->render('save', array('model' => $model));

        return $products;
    }


}