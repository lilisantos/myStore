<?php

use yii\helpers\Html;

?>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Orders</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>Order</td>
                            <td>Quantity</td>
                            <td>Date</td>
                            <td>Total Amount</td>
                            <td>User</td>

                        </tr>
                        <?php foreach ($models as $order): ?>
                            <tr>

                                <td> <?= Html::a($order->product->name, array('site/save', 'id'=>$order->id));?></td>
                                <td> <?= Html::a($order->quantity, array('site/save', 'id'=>$order->id)); ?></td>
                                <td> <?= Html::a($order->date, array('site/save', 'id'=>$order->id));?> </td>
                                <td> <?= Html::a($order->totalAmount, array('site/save', 'id'=>$order->id));?> </td>
                                <td> <?= Html::a($order->user->username, array('site/save', 'id'=>$order->id));?> </td>
                                <td>
                                    <?= Html::a('update',
                                        array('site/save', 'id'=>$order->id),
                                        ['class' => 'btn btn-block btn-primary']
                                    );?>
                                    <?= Html::a('delete',
                                        array('site/delete', 'id'=>$order->id),
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
