<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Products;
use app\controllers\OrderController;

?>
<?php $form = ActiveForm::begin(array(
    'options' => array('role' => 'form'),
)); ?>
<div class="container">
    <div class="row">
        <!-- left column -->
        <div class="col-md-9">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">New Order</h3>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <div class="col-md-9">
                            <label>Products</label>
<!--                              -<//= Html::activeDropDownList(
//                                    $model,
//                                    'product_id',
//                                    $products,
//                                    ['class' => 'form-control']); ?>-->

                            <select id="orders-product_id" class="form-control" name="Orders[product_id]">
                                <option>Select a product...</option>
                                <?php foreach ($products as $product):?>
                                    <option value="<?= $product->id; ?>"><?= $product->name; ?></option>
                                <?php endforeach;?>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9">
                            <?php echo $form->field($model, 'quantity')->textInput(['type' => 'number', 'class' => 'form-control']); ?>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <?= Html::submitButton('Submit', array('class' => 'btn btn-primary pull-right')); ?>
                </div>


            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>