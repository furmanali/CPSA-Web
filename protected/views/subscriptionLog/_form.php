<?php
/* @var $this SubscriptionLogController */
/* @var $model SubscriptionLog */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subscription-log-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'users_credentials_id'); ?>
		<?php echo $form->textField($model,'users_credentials_id'); ?>
		<?php echo $form->error($model,'users_credentials_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subscription_id'); ?>
		<?php echo $form->textField($model,'subscription_id'); ?>
		<?php echo $form->error($model,'subscription_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sub_name'); ?>
		<?php echo $form->textField($model,'sub_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'sub_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hits_allowed'); ?>
		<?php echo $form->textField($model,'hits_allowed',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'hits_allowed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'durations_in_days'); ?>
		<?php echo $form->textField($model,'durations_in_days'); ?>
		<?php echo $form->error($model,'durations_in_days'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'purchase_date'); ?>
		<?php echo $form->textField($model,'purchase_date'); ?>
		<?php echo $form->error($model,'purchase_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->