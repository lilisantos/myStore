<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="container">
    <div class="row">
        <!-- left column -->
        <div class="col-md-9">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">New Product</h3>
                </div>


                <?php $form = ActiveForm::begin(array(
                    'options' => array('class' => 'form-horizontal', 'role' => 'form'),
                )); ?>
                <div class="box-body">
                    <div class="form-group">
                        <div class="col-md-9">
<!--                            <label>Name</label>-->
<!--                            <input type="text" class="form-control" id="name" placeholder="Enter product name">-->
                            <?php echo $form->field($model, 'name')->textInput(array('class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9">
<!--                            <label>Description</label>-->
<!--                            <textarea class="form-control" id="description" placeholder="Enter product description"></textarea>-->
                            <?php echo $form->field($model, 'description')->textArea(array('class' => 'form-control')); ?>
                        </div>
                       <!-- -->
                    </div>
                    <div class="form-group">
                        <div class="col-md-9">
<!--                            <label>Price</label>-->
<!--                            <input type="number" class="form-control" id="price" placeholder="Enter product price">-->
                            <?php echo $form->field($model, 'price')->textInput(array('class' => 'form-control')); ?>
                        </div>

                    </div>
                </div>

            <div class="box-footer">
                <?= Html::submitButton('Submit', array('class' => 'btn btn-primary pull-right')); ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
</div>