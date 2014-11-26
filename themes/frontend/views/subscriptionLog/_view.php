<?php
/* @var $this SubscriptionLogController */
/* @var $data SubscriptionLog */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('users_credentials_id')); ?>:</b>
	<?php echo CHtml::encode($data->users_credentials_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subscription_id')); ?>:</b>
	<?php echo CHtml::encode($data->subscription_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_name')); ?>:</b>
	<?php echo CHtml::encode($data->sub_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hits_allowed')); ?>:</b>
	<?php echo CHtml::encode($data->hits_allowed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('durations_in_days')); ?>:</b>
	<?php echo CHtml::encode($data->durations_in_days); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('purchase_date')); ?>:</b>
	<?php echo CHtml::encode($data->purchase_date); ?>
	<br />

	*/ ?>

</div>