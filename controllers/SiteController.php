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

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['save', 'delete', 'logout'],
                'rules' => [
                    [
                        'actions' => ['index', 'save', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

//        $models = Products::find()->all();
//        $myComponent = Yii::$app->myComponent;
//
//        $myComponent->printString();
//        die;

        return $this->render('index');
//        \Yii::$app->response->data = $this->render('index', array('models' => $models));

    }

    public function actionTestPermission($userId){
        $auth = Yii::$app->authManager;

        echo "<p>Index Products: {$auth->checkAccess($userId, 'products/index')}</p>";
        echo "<p>Add Products: {$auth->checkAccess($userId, 'products/add')}</p>";
        echo "<p>Add Order: {$auth->checkAccess($userId, 'orders/add')}</p>";
        echo "<p>Delete Product: {$auth->checkAccess($userId, 'products/delete')}</p>";
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
//    public function actionLogin()
//    {
//        $this->layout = 'signin';
//
//        if (!\Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
//
//        $model = new LoginForm();
//        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            return $this->goBack();
//        } else {
//            return $this->render('login', [
//                'model' => $model,
//            ]);
//        }
//    }

    private function loadModel($id)
    {
        $model = Products::find()->where(['id' => $id])->one();

        if ($model == NULL)
            throw new HttpException(404, 'Model not found.');

        return $model;
    }

    public function actionLogin()
    {
        $this->layout = 'signin';

        if (!\Yii::$app->user->isGuest) {
            $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load($_POST) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    public function actionDelete($id = NULL){
        $model =  $this->loadModel($id);

        if(!$model->delete())
            Yii::$app->session->setFlash('error', 'Unable to delete model');

       $this->redirect('site/index');


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
//                $this->redirect($this->createUrl('save', array('id' => $model->id)));
                $this->redirect('site/index');
            }
            else
                Yii::$app->session->setFlash('error', 'Model could not be saved');
        }

        \Yii::$app->response->data = $this->render('save', array('model' => $model));
    }
}
