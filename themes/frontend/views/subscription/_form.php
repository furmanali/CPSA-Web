<?php
/* @var $this SubscriptionController */
/* @var $model Subscription */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subscription-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-6" style="margin: auto;">
	<?php //echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'sub_name',array('class'=>'h5')); ?>
		<?php echo $form->textField($model,'sub_name',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'sub_name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'hits_allowed',array('class'=>'h5')); ?>
		<?php echo $form->textField($model,'hits_allowed',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'hits_allowed'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'price',array('class'=>'h5')); ?>
		<?php echo $form->textField($model,'price',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'durations_in_days',array('class'=>'h5')); ?>
		<?php echo $form->textField($model,'durations_in_days',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'durations_in_days'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="margin: auto;">
<?php $this->endWidget(); ?>

</div><!-- form -->