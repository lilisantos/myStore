<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
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
                            <?= $form->field($model, 'product')->dropdownList([
                                1 => 'item 1',
                                2 => 'item 2'
                            ],
                                ['prompt'=>'Select Category']
                            ); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9">
                            <label>Description</label>
                            <textarea class="form-control" id="description" placeholder="Enter product description"></textarea>
<!--                  <!--<//= $form->field($model, 'description')->textArea(array('class' => 'form-control')); -->
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9">
                            <!--                            <label>Price</label>-->
                            <!--                            <input type="number" class="form-control" id="price" placeholder="Enter product price">-->
                            <?= $form->field($model, 'price')->textInput(array('class' => 'form-control')); ?>
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