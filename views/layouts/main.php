<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\SideBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;


//AppAsset::register($this);

/* @var $this \yii\web\View */
/* @var $content string */
$this->title = $this->title;

dmstr\web\AdminLteAsset::register($this);
AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Ionicons -->
    <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <?php $this->head() ?>


</head>
<!--------------------------------------------------------
SKINS
    "skin-blue",
    "skin-black",
    "skin-red",
    "skin-yellow",
    "skin-purple",
    "skin-green",
    "skin-blue-light",
    "skin-black-light",
    "skin-red-light",
    "skin-yellow-light",
    "skin-purple-light",
    "skin-green-light"
---------------------------------------------------------->
<div class="hold-transition skin-blue-light sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper">


    <header class="main-header">
        <!-- Logo -->
        <a href="<?= \Yii::$app->homeUrl ?>" class="logo">
            <span class="logo-mini">M<b>S</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">My<b>Store</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

            </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs">Alexander Pierce</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                               <p>Alexander Pierce - Web Developer</p>
                            </li>

                            <li class="user-footer">

                                <div class="pull-right">
                                    <?= Html::a('Sign Out', ['/user/logout'], ['class'=>'btn btn-default btn-flat']) ?>

                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <?= dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                    'items' => [

                        ['label' => 'Home',
                            'url' => ['site/index'],
                            'icon' => 'fas fa-home'
                        ],
                        ['label' => 'View Products', 'url' => ['product/index']],
                        ['label' => 'New Product',
                            'url' => ['product/save'],
                            'icon' => 'fas fa-plus'
                        ],
                        ['label' => 'View Orders', 'url' => ['order/index']],
                        ['label' => 'New Order',
                            'url' => ['order/save'],
                            'icon' => 'fas fa-plus'
                        ]

                    ]
                ]
            ) ?>

        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <small><?= $this->title ?></small>
            </h1>

        </section>

        <!-- Main content -->

        <section class="content">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </section>
        <!-- /.content -->

        <div class="container">
            <?php if (Yii::$app->session->hasFlash('success')): ?>
                <div class="alert alert-success alert-dismissible">
                    <?php echo Yii::$app->session->getFlash('success'); ?>
                </div>

            <?php elseif (Yii::$app->session->hasFlash('error')): ?>
                <div class="alert alert-warning alert-dismissible">
                    <?php echo Yii::$app->session->getFlash('error'); ?>
                </div>

            <?php endif; ?>
        </div>

    </div>
</div>
</div>
</body>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>

</html>
<?php $this->endPage() ?>

