<?php
/* @var $this SharedGoogleDriveTemplatesController */
/* @var $data SharedGoogleDriveTemplates */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gid')); ?>:</b>
	<?php echo CHtml::encode($data->gid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shared_google_printers_id')); ?>:</b>
	<?php echo CHtml::encode($data->shared_google_printers_id); ?>
	<br />


</div>