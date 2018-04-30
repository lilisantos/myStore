<?php

namespace app\controllers;

use Yii;
use Yii\web\Controller;

Class OrderController extends Controller{

    public function actionView($id)
    {
        $model = Post::findOne($id);
        if ($model === null) {
            throw new NotFoundHttpException;
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}