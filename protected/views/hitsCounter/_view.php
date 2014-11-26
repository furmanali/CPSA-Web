<?php
/* @var $this HitsCounterController */
/* @var $data HitsCounter */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('users_credentials_id')); ?>:</b>
	<?php echo CHtml::encode($data->users_credentials_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hits_available')); ?>:</b>
	<?php echo CHtml::encode($data->hits_available); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hits_success')); ?>:</b>
	<?php echo CHtml::encode($data->hits_success); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hits_failure')); ?>:</b>
	<?php echo CHtml::encode($data->hits_failure); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('counter_total')); ?>:</b>
	<?php echo CHtml::encode($data->counter_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('counter_consecutive_failed')); ?>:</b>
	<?php echo CHtml::encode($data->counter_consecutive_failed); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_of_expiry')); ?>:</b>
	<?php echo CHtml::encode($data->date_of_expiry); ?>
	<br />

	*/ ?>

</div>