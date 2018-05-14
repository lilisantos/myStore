<?php

use yii\helpers\Html;

use app\models\Products;
use app\models\User;

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
                            <td>#Order</td>
                            <td>Product</td>
                            <td>Quantity</td>
                            <td>Date</td>
                            <td>Total Amount</td>
                            <td>User</td>

                        </tr>
                        <?php foreach ($models as $order): ?>
                            <tr>
                               <?php $product = Products::findOne($order->product_id); ?>
                               <?php $user = User::findOne($order->user_id); ?>

                                <td> <?= Html::a($order->id, ['order/save', 'id'=>$order->id]);?></td>
                                <td> <?= Html::a($product->name, ['order/save', 'id'=>$order->id]);?></td>
                                <td> <?= Html::a($order->quantity, ['order/save', 'id'=>$order->id]); ?></td>
                                <td> <?= Html::a(Yii::$app->formatter->format($order->date, 'date'),
                                        ['order/save', 'id'=>$order->id]);?> </td>
                                <td> <?= Html::a(Yii::$app->formatter->format($order->total_amount, 'currency'),
                                        ['order/save', 'id'=>$order->id]);?> </td>
                                <td> <?= Html::a($user->username, ['order/save', 'id'=>$order->id]);?> </td>
                                <td>
                                    <?= Html::a('update',
                                        ['order/save', 'id'=>$order->id],
                                        ['class' => 'btn btn-block btn-primary']
                                    );?>
                                    <?= Html::a('delete',
                                        ['order/delete', 'id'=>$order->id],
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
