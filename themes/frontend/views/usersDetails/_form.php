<?php
/* @var $this UsersDetailsController */
/* @var $model UsersDetails */
/* @var $form CActiveForm */
?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <h4 class="text-center">Fill in your details to Subscribe</h4>
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'users-details-form',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation'=>false,
            )); ?>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'first_name',array('class'=>'h5')); ?>
                        <?php echo $form->textField($model,'first_name',array('class'=>'form-control','placeholder'=>"Enter First Name")); ?>
                        <?php echo $form->error($model,'first_name'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model_credentials,'email',array('class'=>'h5')); ?>
                        <?php echo $form->textField($model_credentials,'email',array('class'=>'form-control','placeholder'=>"Enter Email")); ?>
                        <?php echo $form->error($model_credentials,'email'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model_credentials,'password',array('class'=>'h5')); ?>
                        <?php echo $form->passwordField($model_credentials,'password',array('class'=>'form-control','placeholder'=>"Enter Password")); ?>
                        <?php echo $form->error($model_credentials,'password'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'address',array('class'=>'h5')); ?>
                        <?php echo $form->textField($model,'address',array('class'=>'form-control','placeholder'=>"Enter Address")); ?>
                        <?php echo $form->error($model,'address'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'state',array('class'=>'h5')); ?>
                        <?php echo $form->textField($model,'state',array('class'=>'form-control','placeholder'=>"Enter State")); ?>
                        <?php echo $form->error($model,'state'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'country',array('class'=>'h5')); ?>
                        <?php echo $form->textField($model,'country',array('class'=>'form-control','placeholder'=>"Enter Country")); ?>
                        <?php echo $form->error($model,'country'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'dob',array('class'=>'h5')); ?>
                        <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                            'name'=>'usersDetails[dob]',
                            'value'=>date('Y-m-d'),
                            'options'=>array(
                                'showButtonPanel'=>true,
                                'dateFormat'=>'yy-m-d',//Date format 'mm/dd/yy','yy-mm-dd','d M, y','d MM, y','DD, d MM, yy'
                            ),
                            'htmlOptions'=>array(
                                'class'=>'form-control'
                            ),
                        ));
                        ?>
                        <?php echo $form->error($model,'dob'); ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'last_name',array('class'=>'h5')); ?>
                        <?php echo $form->textField($model,'last_name',array('class'=>'form-control','placeholder'=>"Enter Last Name")); ?>
                        <?php echo $form->error($model,'last_name'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'phone',array('class'=>'h5')); ?>
                        <?php echo $form->textField($model,'phone',array('class'=>'form-control','placeholder'=>"Enter Phone")); ?>
                        <?php echo $form->error($model,'phone'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model_credentials,'repeat_password',array('class'=>'h5')); ?>
                        <?php echo $form->passwordField($model_credentials,'repeat_password',array('class'=>'form-control','placeholder'=>"Repeat Password")); ?>
                        <?php echo $form->error($model_credentials,'repeat_password'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'city',array('class'=>'h5')); ?>
                        <?php echo $form->textField($model,'city',array('class'=>'form-control','placeholder'=>"Enter City")); ?>
                        <?php echo $form->error($model,'city'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'postalcode',array('class'=>'h5')); ?>
                        <?php echo $form->textField($model,'postalcode',array('class'=>'form-control','placeholder'=>"Enter Postal Code")); ?>
                        <?php echo $form->error($model,'postalcode'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'company_name',array('class'=>'h5')); ?>
                        <?php echo $form->textField($model,'company_name',array('class'=>'form-control','placeholder'=>"Enter Company Name")); ?>
                        <?php echo $form->error($model,'company_name'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'gender',array('class'=>'h5')); ?>
                        <?php echo $form->dropDownList($model,'gender',array('1'=>'Male','0'=>'Female'),array('prompt'=>'Select Gender','class'=>'form-control')); ?>
                        <?php echo $form->error($model,'gender'); ?>
                    </div>

                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign Up</button>
                </div>
            </div>
            <?php $this->endWidget(); ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-1">
        <h4 class="text-center">If you are aleady a User Please login</h4>
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'login-form',
            'enableClientValidation'=>true,
            'action' => array( '/site/login' ),
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>
            <div class="form-group">
                <?php echo $form->labelEx($model_credentials_login,'email',array('class'=>'h5')); ?>
                <?php echo $form->textField($model_credentials_login,'email',array('class'=>'form-control','placeholder'=>"Enter Email")); ?>
                <?php echo $form->error($model_credentials_login,'email'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model_credentials_login,'password',array('class'=>'h5')); ?>
                <?php echo $form->passwordField($model_credentials_login,'password',array('class'=>'form-control','placeholder'=>"Enter Password")); ?>
                <?php echo $form->error($model_credentials_login,'password'); ?>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign In</button>
        <?php $this->endWidget(); ?>
    </div>
</div>
