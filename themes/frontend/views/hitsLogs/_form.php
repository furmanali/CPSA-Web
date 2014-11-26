<?php
/* @var $this HitsLogsController */
/* @var $model HitsLogs */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hits-logs-form',
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
		<?php echo $form->labelEx($model,'authkey'); ?>
		<?php echo $form->textField($model,'authkey',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'authkey'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x2license'); ?>
		<?php echo $form->textField($model,'x2license',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'x2license'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'google_drive_template_id'); ?>
		<?php echo $form->textField($model,'google_drive_template_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'google_drive_template_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'google_printer_id'); ?>
		<?php echo $form->textField($model,'google_printer_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'google_printer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ip'); ?>
		<?php echo $form->textField($model,'ip',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_created'); ?>
		<?php echo $form->textField($model,'date_created'); ?>
		<?php echo $form->error($model,'date_created'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->