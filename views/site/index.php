<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\classes\widgets\HelloWidget;
use \app\classes\widgets\HelloWorldBeginEndWidget;

use yii\helpers\Url;

?>

<div>
    <?= HelloWidget::widget(); ?>


</div>

<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>View Orders</h3>
            </div>
            <div class="icon">
                <i class="fa fa-list"></i>
            </div>
            <?= Html::a('More Info', ['/order/index'], ['class'=>'small-box-footer']) ?>
        </div>
    </div>
    <div class="col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>New Order</h3>
            </div>
            <div class="icon">
                <i class="fa fa-shopping-cart"></i>
            </div>

            <?= Html::a('More Info', ['/order/save'], ['class'=>'small-box-footer']) ?>

        </div>
    </div>
    <!-- ./col -->
    <div class="col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>View Products</h3>
            </div>
            <div class="icon">
                <i class="fa fa-list"></i>
            </div>
            <?= Html::a('More Info', ['/product/index'], ['class'=>'small-box-footer']) ?>

        </div>
    </div>

    <div class="col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>New Product</h3>
            </div>
            <div class="icon">
                <i class="fa fa-plus"></i>
            </div>
            <?= Html::a('More Info', ['/product/save'], ['class'=>'small-box-footer']) ?>
        </div>
    </div>
    <!-- ./col -->

</div>
<!-- /.row -->


