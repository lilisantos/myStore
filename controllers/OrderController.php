<?php

namespace app\controllers;

use app\models\Orders;
use app\models\Products;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

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

        $products = Products::find()->all();

        if ($id == NULL)
            $model = new Orders();
        else
            $model = $this->loadModel($id);

        if (isset($_POST['Orders']))
        {
            $model->load($_POST);

            $model->date = date('d-m-Y');

            $model->totalAmount = ($model->products->price * $model->quantity);

            $model->user_id = Yii::$app->user->id;

            echo "<pre>";
                print_r("Quantity: {$model->quantity}\n");
                print_r("Date: ".$model->date);
                print_r("Total Amount: ".$model->totalAmount);
                print_r("Product: ".$model->product_id);
//                print_r("Product price: ".$model->products->price);
                print_r("User: ".$model->user_id);
//                var_dump($model);
            echo "</pre>";

            if ($model->save())
            {
                Yii::$app->session->setFlash('success', 'Model has been saved');
                $this->createUrl('save', array('id' => $model->id));
                $this->redirect('order/index');
            }
            else
                Yii::$app->session->setFlash('error', 'Model could not be saved');
        }

        \Yii::$app->response->data = $this->render('save', ['model' => $model, 'products' => $products]);


    }


}