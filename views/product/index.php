<?php

use yii\helpers\Html;

?>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Products</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>Product Name</td>
                            <td>Description</td>
                            <td>Price</td>
                        </tr>
                        <?php foreach ($models as $product): ?>
                            <tr>

                                <td> <?= Html::a($product->name, array('site/save', 'id'=>$product->id));?></td>
                                <td> <?= Html::a($product->description, array('site/save', 'id'=>$product->id)); ?></td>
                                <td> <?= Html::a($product->price, array('site/save', 'id'=>$product->id));?> </td>
                                <td>
                                    <?= Html::a('update',
                                        array('site/save', 'id'=>$product->id),
                                        ['class' => 'btn btn-block btn-primary']
                                    );?>
                                    <?= Html::a('delete',
                                        array('site/delete', 'id'=>$product->id),
                                        ['class' => 'btn btn-block btn-danger']
                                    );?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
