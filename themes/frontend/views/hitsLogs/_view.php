<?php
/* @var $this HitsLogsController */
/* @var $data HitsLogs */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('users_credentials_id')); ?>:</b>
	<?php echo CHtml::encode($data->users_credentials_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('authkey')); ?>:</b>
	<?php echo CHtml::encode($data->authkey); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x2license')); ?>:</b>
	<?php echo CHtml::encode($data->x2license); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('google_drive_template_id')); ?>:</b>
	<?php echo CHtml::encode($data->google_drive_template_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('google_printer_id')); ?>:</b>
	<?php echo CHtml::encode($data->google_printer_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip')); ?>:</b>
	<?php echo CHtml::encode($data->ip); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_created')); ?>:</b>
	<?php echo CHtml::encode($data->date_created); ?>
	<br />

	*/ ?>

</div>