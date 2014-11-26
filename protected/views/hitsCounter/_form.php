<?php
/* @var $this HitsCounterController */
/* @var $model HitsCounter */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hits-counter-form',
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
		<?php echo $form->labelEx($model,'hits_available'); ?>
		<?php echo $form->textField($model,'hits_available'); ?>
		<?php echo $form->error($model,'hits_available'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hits_success'); ?>
		<?php echo $form->textField($model,'hits_success'); ?>
		<?php echo $form->error($model,'hits_success'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hits_failure'); ?>
		<?php echo $form->textField($model,'hits_failure'); ?>
		<?php echo $form->error($model,'hits_failure'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'counter_total'); ?>
		<?php echo $form->textField($model,'counter_total'); ?>
		<?php echo $form->error($model,'counter_total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'counter_consecutive_failed'); ?>
		<?php echo $form->textField($model,'counter_consecutive_failed'); ?>
		<?php echo $form->error($model,'counter_consecutive_failed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_of_expiry'); ?>
		<?php echo $form->textField($model,'date_of_expiry'); ?>
		<?php echo $form->error($model,'date_of_expiry'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->