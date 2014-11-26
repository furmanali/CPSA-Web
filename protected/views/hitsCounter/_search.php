<?php
/* @var $this HitsCounterController */
/* @var $model HitsCounter */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'users_credentials_id'); ?>
		<?php echo $form->textField($model,'users_credentials_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hits_available'); ?>
		<?php echo $form->textField($model,'hits_available'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hits_success'); ?>
		<?php echo $form->textField($model,'hits_success'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hits_failure'); ?>
		<?php echo $form->textField($model,'hits_failure'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'counter_total'); ?>
		<?php echo $form->textField($model,'counter_total'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'counter_consecutive_failed'); ?>
		<?php echo $form->textField($model,'counter_consecutive_failed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_of_expiry'); ?>
		<?php echo $form->textField($model,'date_of_expiry'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->