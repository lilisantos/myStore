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
                    <h3 class="box-title">New Product</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <div class="col-md-9">
                            <?php echo $form->field($model, 'name')->textInput(array('class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9">
                            <?php echo $form->field($model, 'description')->textArea(array('class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9">
                            <?php echo $form->field($model, 'price')->textInput(array('class' => 'form-control')); ?>
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